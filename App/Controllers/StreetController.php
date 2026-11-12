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
 * Ulice pochôdzky: pridanie, premenovanie, presun do inej pochôdzky a zmazanie ulice a editor čísel domov.
 * Zoznam ulíc je súčasťou stránky pochôdzky, kam sa po každej zmene vráti. Čísla domov v editore sú zatiaľ statický
 * ukážkový obsah.
 */
class StreetController extends BaseController
{
    /**
     * Kľúč správy po akcii v relácii; zobrazí sa raz nad zoznamom ulíc pochôdzky.
     */
    public const MESSAGE_KEY = 'street.message';

    /**
     * Povolí iba akcie tohto kontroléra; iné verejné metódy (aj zdedené) sa ako akcie nespustia.
     */
    public function authorize(Request $request, string $action): bool
    {
        return match ($action) {
            'index', 'edit', 'store', 'update', 'move', 'delete' => true,
            default => false,
        };
    }

    /**
     * Zoznam ulíc je na stránke pochôdzky, preto predvolená akcia presmeruje na zoznam pochôdzok.
     */
    public function index(Request $request): Response
    {
        return $this->redirect($this->url('walk.index'))->setStatusCode(302);
    }

    /**
     * Editor ulice; názov ulice a jej pochôdzky je z databázy.
     */
    public function edit(Request $request): Response
    {
        $street = WalkOwnership::street($request->get('id'), WalkOwnership::OWNER_ID);
        return $this->html([
            'street' => $street,
            'walk' => $street->getWalk(),
        ]);
    }

    /**
     * Pridanie ulice do pochôdzky z formulára nad zoznamom ulíc.
     */
    public function store(Request $request): Response
    {
        $this->requirePost($request);

        $walk = WalkOwnership::walk($request->get('walkId'), WalkOwnership::OWNER_ID);
        $street = new Street();
        $street->setWalkId($walk->getId());
        $street->setName($this->nameFrom($request));
        $street->save();

        return $this->backToWalk($walk, 'Ulica ' . $street->getName() . ' bola pridaná.');
    }

    /**
     * Premenovanie ulice z modálneho okna.
     */
    public function update(Request $request): Response
    {
        $this->requirePost($request);

        $street = WalkOwnership::street($request->get('id'), WalkOwnership::OWNER_ID);
        $street->setName($this->nameFrom($request));
        $street->save();

        return $this->backToWalk($street->getWalk(), 'Ulica ' . $street->getName() . ' bola premenovaná.');
    }

    /**
     * Presun ulice do inej pochôdzky toho istého vlastníka z modálneho okna. Ulica si so sebou berie všetko,
     * čo k nej patrí. Po presune sa stránka vráti do pôvodnej pochôdzky, odkiaľ ulica odišla.
     */
    public function move(Request $request): Response
    {
        $this->requirePost($request);

        $street = WalkOwnership::street($request->get('id'), WalkOwnership::OWNER_ID);
        $from = $street->getWalk();
        $to = WalkOwnership::walk($request->post('walkId'), WalkOwnership::OWNER_ID);
        if ($to->getId() === $from->getId()) {
            return $this->redirect($this->url('walk.show', ['id' => $from->getId()]))->setStatusCode(303);
        }

        $street->setWalkId($to->getId());
        $street->save();

        return $this->backToWalk(
            $from,
            'Ulica ' . $street->getName() . ' bola presunutá do pochôdzky ' . $to->getName() . '.'
        );
    }

    /**
     * Zmazanie ulice.
     */
    public function delete(Request $request): Response
    {
        $this->requirePost($request);

        $street = WalkOwnership::street($request->get('id'), WalkOwnership::OWNER_ID);
        $walk = $street->getWalk();
        $street->delete();

        return $this->backToWalk($walk, 'Ulica ' . $street->getName() . ' bola zmazaná.');
    }

    /**
     * Názov ulice z formulára bez okrajových medzier: povinný, najviac 100 znakov ako v poli formulára.
     */
    private function nameFrom(Request $request): string
    {
        $name = trim((string) ($request->post('name') ?? ''));
        if ($name === '' || mb_strlen($name) > 100) {
            throw new HttpException(422, 'Názov ulice je povinný, najviac 100 znakov.');
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
     * Uloží správu o akcii a presmeruje na ulice pochôdzky; po odoslaní formulára nasleduje GET (303).
     */
    private function backToWalk(Walk $walk, string $message): Response
    {
        $this->app->getSession()->set(StreetController::MESSAGE_KEY, $message);
        return $this->redirect($this->url('walk.show', ['id' => $walk->getId()]))->setStatusCode(303);
    }
}
