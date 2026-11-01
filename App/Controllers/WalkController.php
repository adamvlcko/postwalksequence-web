<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\Core\BaseController;
use Framework\Http\Request;
use Framework\Http\Responses\Response;

/**
 * Pochôdzky doručovateľa: zoznam pochôdzok a ulice jednej pochôdzky.
 * Stránky zatiaľ zobrazujú statický ukážkový obsah.
 */
class WalkController extends BaseController
{
    /**
     * Povolí iba akcie tohto kontroléra; iné verejné metódy (aj zdedené) sa ako akcie nespustia.
     */
    public function authorize(Request $request, string $action): bool
    {
        return match ($action) {
            'index', 'show' => true,
            default => false,
        };
    }

    /**
     * Zoznam pochôdzok.
     */
    public function index(Request $request): Response
    {
        return $this->html();
    }

    /**
     * Ulice jednej pochôdzky.
     */
    public function show(Request $request): Response
    {
        return $this->html();
    }
}
