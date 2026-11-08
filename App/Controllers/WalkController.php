<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Walk;
use Framework\Core\BaseController;
use Framework\Http\HttpException;
use Framework\Http\Request;
use Framework\Http\Responses\Response;

/**
 * Pochôdzky doručovateľa: zoznam pochôdzok s pridaním, premenovaním a zmazaním a ulice jednej pochôdzky.
 * Ulice zatiaľ zobrazujú statický ukážkový obsah.
 */
class WalkController extends BaseController
{
    /**
     * Kým aplikácia nemá prihlásenie, všetky pochôdzky patria ukážkovému používateľovi novak.
     */
    private const OWNER_ID = 1;

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
     * Ulice jednej pochôdzky.
     */
    public function show(Request $request): Response
    {
        $walk = $this->ownedWalk($request->get('id'));
        return $this->html(compact('walk'));
    }

    /**
     * Pridanie pochôdzky z formulára nad zoznamom.
     */
    public function store(Request $request): Response
    {
        $this->requirePost($request);

        $walk = new Walk();
        $walk->setUserId(WalkController::OWNER_ID);
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
            'editing' => $this->ownedWalk($request->get('id')),
        ], 'index');
    }

    /**
     * Premenovanie pochôdzky z modálneho okna.
     */
    public function update(Request $request): Response
    {
        $this->requirePost($request);

        $walk = $this->ownedWalk($request->get('id'));
        $walk->setName($this->nameFrom($request));
        $walk->save();

        return $this->backToList('Pochôdzka ' . $walk->getName() . ' bola premenovaná.');
    }

    /**
     * Zmazanie pochôdzky.
     */
    public function delete(Request $request): Response
    {
        $this->requirePost($request);

        $walk = $this->ownedWalk($request->get('id'));
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
        return Walk::getAll('user_id = ?', [WalkController::OWNER_ID], 'created_at, id');
    }

    /**
     * Pochôdzka podľa identifikátora z adresy. Hodnota z adresy je reťazec, pole (napr. id[]=1) alebo null, ak
     * chýba. Neplatný identifikátor, neexistujúca aj cudzia pochôdzka vedú na tú istú chybu 404, aby sa nedalo
     * zistiť, ktoré pochôdzky existujú.
     */
    private function ownedWalk(string|array|null $id): Walk
    {
        $id = filter_var($id, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
        if ($id === false) {
            throw new HttpException(404);
        }

        $walk = Walk::getOne($id);
        if ($walk === null || $walk->getUserId() !== WalkController::OWNER_ID) {
            throw new HttpException(404);
        }
        return $walk;
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
