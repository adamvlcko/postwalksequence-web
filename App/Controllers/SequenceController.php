<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\WalkOwnership;
use Framework\Core\BaseController;
use Framework\Http\Request;
use Framework\Http\Responses\Response;

/**
 * Denné poradia ulice: zoznam poradí, zaraďovanie zásielok a poradie adresných bodov.
 * Zoznam poradí berie názov ulice a pochôdzky z databázy; poradia a ostatné stránky zatiaľ zobrazujú statický
 * ukážkový obsah.
 */
class SequenceController extends BaseController
{
    /**
     * Povolí iba akcie tohto kontroléra; iné verejné metódy (aj zdedené) sa ako akcie nespustia.
     */
    public function authorize(Request $request, string $action): bool
    {
        return match ($action) {
            'index', 'sort', 'show' => true,
            default => false,
        };
    }

    /**
     * Poradia ulice.
     */
    public function index(Request $request): Response
    {
        $street = WalkOwnership::street($request->get('streetId'), WalkOwnership::OWNER_ID);
        return $this->html([
            'street' => $street,
            'walk' => $street->getWalk(),
        ]);
    }

    /**
     * Zaraďovanie zásielok do otvoreného poradia.
     */
    public function sort(Request $request): Response
    {
        return $this->html();
    }

    /**
     * Poradie adresných bodov.
     */
    public function show(Request $request): Response
    {
        return $this->html();
    }
}
