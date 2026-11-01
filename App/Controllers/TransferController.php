<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\Core\BaseController;
use Framework\Http\Request;
use Framework\Http\Responses\Response;

/**
 * Prenos pochôdzok: export a import súboru a náhľad importu.
 * Stránky zatiaľ zobrazujú statický ukážkový obsah.
 */
class TransferController extends BaseController
{
    /**
     * Povolí iba akcie tohto kontroléra; iné verejné metódy (aj zdedené) sa ako akcie nespustia.
     */
    public function authorize(Request $request, string $action): bool
    {
        return match ($action) {
            'index', 'preview' => true,
            default => false,
        };
    }

    /**
     * Export a import pochôdzok.
     */
    public function index(Request $request): Response
    {
        return $this->html();
    }

    /**
     * Náhľad importu pred potvrdením.
     */
    public function preview(Request $request): Response
    {
        return $this->html();
    }
}
