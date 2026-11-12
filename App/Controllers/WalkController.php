<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Street;
use App\Models\Walk;
use App\Services\WalkOwnership;
use Framework\Core\BaseController;
use Framework\Http\HttpException;
use Framework\Http\Request;
use Framework\Http\Responses\Response;

/**
 * Pochôdzky doručovateľa: zoznam pochôdzok s pridaním, premenovaním a zmazaním a ulice jednej pochôdzky.
 * Pridanie, premenovanie, presun a zmazanie ulice spracuje StreetController.
 */
class WalkController extends BaseController
{
    /**
     * Kľúč správy po akcii v relácii; zobrazí sa raz nad zoznamom pochôdzok.
     */
    private const MESSAGE_KEY = 'walk.message';

    /**
     * Povolí iba akcie tohto kontroléra; iné verejné metódy (aj zdedené) sa ako akcie nespustia.
     */
    public function authorize(Request $request, string $action): bool
    {
        return match ($action) {
            'index', 'show', 'store', 'edit', 'update', 'delete' => true,
            default => false,
        };
    }

    /**
     * Zoznam pochôdzok so správou o poslednej akcii.
     */
    public function index(Request $request): Response
    {
        $session = $this->app->getSession();
        $message = $session->get(WalkController::MESSAGE_KEY);
        $session->remove(WalkController::MESSAGE_KEY);

        return $this->html([
            'walks' => $this->ownWalks(),
            'message' => $message,
            'editing' => null,
        ]);
    }

    /**
     * Ulice jednej pochôdzky so správou o poslednej akcii. Parameter rename alebo move v adrese otvorí okno
     * na premenovanie alebo presun vybranej ulice tejto pochôdzky.
     */
    public function show(Request $request): Response
    {
        $walk = WalkOwnership::walk($request->get('id'), WalkOwnership::OWNER_ID);

        $session = $this->app->getSession();
        $message = $session->get(StreetController::MESSAGE_KEY);
        $session->remove(StreetController::MESSAGE_KEY);

        $renaming = $this->streetOfWalk($walk, $request->get('rename'));
        $moving = $this->streetOfWalk($walk, $request->get('move'));

        return $this->html([
            'walk' => $walk,
            'streets' => Street::getAll('walk_id = ?', [$walk->getId()], 'id'),
            'message' => $message,
            'renaming' => $renaming,
            'moving' => $moving,
            'walks' => $moving !== null ? $this->ownWalks() : [],
        ]);
    }

    /**
     * Pridanie pochôdzky z formulára nad zoznamom.
     */
    public function store(Request $request): Response
    {
        $this->requirePost($request);

        $walk = new Walk();
        $walk->setUserId(WalkOwnership::OWNER_ID);
        $walk->setName($this->nameFrom($request));
        $walk->setCreatedAt(date('Y-m-d H:i:s'));
        $walk->save();

        return $this->backToList('Pochôdzka ' . $walk->getName() . ' bola pridaná.');
    }

    /**
     * Zoznam pochôdzok s otvoreným oknom na premenovanie vybranej pochôdzky.
     */
    public function edit(Request $request): Response
    {
        return $this->html([
            'walks' => $this->ownWalks(),
            'message' => null,
            'editing' => WalkOwnership::walk($request->get('id'), WalkOwnership::OWNER_ID),
        ], 'index');
    }

    /**
     * Premenovanie pochôdzky z modálneho okna.
     */
    public function update(Request $request): Response
    {
        $this->requirePost($request);

        $walk = WalkOwnership::walk($request->get('id'), WalkOwnership::OWNER_ID);
        $walk->setName($this->nameFrom($request));
        $walk->save();

        return $this->backToList('Pochôdzka ' . $walk->getName() . ' bola premenovaná.');
    }

    /**
     * Zmazanie pochôdzky; databáza zmaže aj jej ulice.
     */
    public function delete(Request $request): Response
    {
        $this->requirePost($request);

        $walk = WalkOwnership::walk($request->get('id'), WalkOwnership::OWNER_ID);
        $walk->delete();

        return $this->backToList('Pochôdzka ' . $walk->getName() . ' bola zmazaná.');
    }

    /**
     * Pochôdzky vlastníka od najstaršej.
     *
     * @return Walk[]
     */
    private function ownWalks(): array
    {
        return Walk::getAll('user_id = ?', [WalkOwnership::OWNER_ID], 'created_at, id');
    }

    /**
     * Ulica z parametra adresy, ktorej okno sa má otvoriť, alebo null, ak parameter chýba. Ulica inej pochôdzky
     * vedie na chybu 404 rovnako ako cudzia ulica.
     */
    private function streetOfWalk(Walk $walk, string|array|null $streetId): ?Street
    {
        if ($streetId === null) {
            return null;
        }

        $street = WalkOwnership::street($streetId, WalkOwnership::OWNER_ID);
        if ($street->getWalkId() !== $walk->getId()) {
            throw new HttpException(404);
        }
        return $street;
    }

    /**
     * Názov pochôdzky z formulára bez okrajových medzier: povinný, najviac 100 znakov ako v poli formulára.
     */
    private function nameFrom(Request $request): string
    {
        $name = trim((string) ($request->post('name') ?? ''));
        if ($name === '' || mb_strlen($name) > 100) {
            throw new HttpException(422, 'Názov pochôdzky je povinný, najviac 100 znakov.');
        }
        return $name;
    }

    /**
     * Zápisové akcie prijmú iba odoslaný formulár, nie odkaz.
     */
    private function requirePost(Request $request): void
    {
        if (!$request->isPost()) {
            throw new HttpException(405);
        }
    }

    /**
     * Uloží správu o akcii a presmeruje na zoznam; po odoslaní formulára nasleduje GET (303).
     */
    private function backToList(string $message): Response
    {
        $this->app->getSession()->set(WalkController::MESSAGE_KEY, $message);
        return $this->redirect($this->url('walk.index'))->setStatusCode(303);
    }
}
