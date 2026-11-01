<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\Core\BaseController;
use Framework\Http\Request;
use Framework\Http\Responses\Response;

/**
 * Prihlásenie, registrácia a odhlásenie. Stránky zatiaľ zobrazujú statický ukážkový obsah.
 */
class AuthController extends BaseController
{
    /**
     * Povolí iba akcie tohto kontroléra; iné verejné metódy (aj zdedené) sa ako akcie nespustia.
     */
    public function authorize(Request $request, string $action): bool
    {
        return match ($action) {
            'index', 'login', 'register', 'logout' => true,
            default => false,
        };
    }

    /**
     * Predvolená akcia vedie na prihlásenie.
     */
    public function index(Request $request): Response
    {
        return $this->redirect($this->url('auth.login'))->setStatusCode(302);
    }

    /**
     * Prihlásenie.
     */
    public function login(Request $request): Response
    {
        return $this->html();
    }

    /**
     * Registrácia nového účtu.
     */
    public function register(Request $request): Response
    {
        return $this->html();
    }

    /**
     * Odhlásenie zruší reláciu a presmeruje na prihlásenie; po odoslaní formulára nasleduje GET (303).
     */
    public function logout(Request $request): Response
    {
        $this->app->getAuthenticator()?->logout();
        return $this->redirect($this->url('auth.login'))->setStatusCode(303);
    }
}
