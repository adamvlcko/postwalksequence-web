<?php

declare(strict_types=1);

namespace App\Models;

use Framework\Core\Model;

/**
 * Pochôdzka (rajón) doručovateľa — jeden riadok tabuľky walks; ulice pochôdzky sú v tabuľke streets.
 * Tabuľku a stĺpce určuje konvencia frameworku: user_id ↔ userId, created_at ↔ createdAt.
 */
class Walk extends Model
{
    protected ?int $id = null;
    protected ?int $userId = null;
    protected ?string $name = null;
    protected ?string $createdAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * Okamih založenia vo formáte stĺpca DATETIME (RRRR-MM-DD HH:MM:SS). Framework pri uložení posiela všetky
     * stĺpce, predvolená hodnota z databázy by sa preto neuplatnila.
     */
    public function setCreatedAt(string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Ulice pochôdzky (záznamy streets s walk_id tejto pochôdzky). Pri pochôdzkach z jedného zoznamu framework
     * načíta ulice všetkých pochôdzok jedným dopytom.
     *
     * @return Street[]
     */
    public function getStreets(): array
    {
        return $this->getAllRelated(Street::class);
    }
}
