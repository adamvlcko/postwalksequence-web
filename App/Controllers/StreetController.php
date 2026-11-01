<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\Core\BaseController;
use Framework\Http\Request;
use Framework\Http\Responses\Response;

/**
 * Ulica pochôdzky: editor čísel domov. Zoznam ulíc je súčasťou stránky pochôdzky.
 * Stránka zatiaľ zobrazuje statický ukážkový obsah.
 */
class StreetController extends BaseController
{
    /**
     * Povolí iba akcie tohto kontroléra; iné verejné metódy (aj zdedené) sa ako akcie nespustia.
     */
    public function authorize(Request $request, string $action): bool
    {
        return match ($action) {
            'index', 'edit' => true,
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
     * Editor ulice.
     */
    public function edit(Request $request): Response
    {
        return $this->html();
    }
}
