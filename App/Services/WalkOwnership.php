<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Street;
use App\Models\Walk;
use Framework\Http\HttpException;

/**
 * Kontrola vlastníctva: pochôdzku a všetko pod ňou (ulice) smie čítať a meniť iba jej vlastník. Neplatný
 * identifikátor, neexistujúci aj cudzí záznam vedú na tú istú chybu 404, aby sa nedalo zistiť, ktoré záznamy
 * existujú.
 */
class WalkOwnership
{
    /**
     * Kým aplikácia nemá prihlásenie, všetky pochôdzky patria ukážkovému používateľovi novak.
     */
    public const OWNER_ID = 1;

    /**
     * Pochôdzka používateľa podľa identifikátora z adresy alebo formulára.
     */
    public static function walk(string|array|null $id, int $userId): Walk
    {
        $walk = Walk::getOne(WalkOwnership::positiveId($id));
        if ($walk === null || $walk->getUserId() !== $userId) {
            throw new HttpException(404);
        }
        return $walk;
    }

    /**
     * Ulica v pochôdzke používateľa podľa identifikátora z adresy. Vlastníka určí pochôdzka, do ktorej ulica patrí.
     */
    public static function street(string|array|null $id, int $userId): Street
    {
        $street = Street::getOne(WalkOwnership::positiveId($id));
        if ($street === null || $street->getWalk()?->getUserId() !== $userId) {
            throw new HttpException(404);
        }
        return $street;
    }

    /**
     * Identifikátor ako kladné celé číslo. Hodnota z požiadavky je reťazec, pole (napr. id[]=1) alebo null, ak chýba.
     */
    private static function positiveId(string|array|null $id): int
    {
        $id = filter_var($id, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
        if ($id === false) {
            throw new HttpException(404);
        }
        return $id;
    }
}
