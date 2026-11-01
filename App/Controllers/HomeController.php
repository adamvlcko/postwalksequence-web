<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\Core\BaseController;
use Framework\Http\Request;
use Framework\Http\Responses\Response;

/**
 * Úvodná adresa aplikácie.
 */
class HomeController extends BaseController
{
    /**
     * Povolí iba akcie tohto kontroléra; iné verejné metódy (aj zdedené) sa ako akcie nespustia.
     */
    public function authorize(Request $request, string $action): bool
    {
        return match ($action) {
            'index' => true,
            default => false,
        };
    }

    /**
     * Úvodná adresa vedie na zoznam pochôdzok. Presmerovanie je dočasné,
     * aby si ho prehliadač nezapamätal natrvalo.
     */
    public function index(Request $request): Response
    {
        return $this->redirect($this->url('walk.index'))->setStatusCode(302);
    }
}
