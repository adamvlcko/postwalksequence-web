<?php

declare(strict_types=1);

namespace App\Models;

use Framework\Core\Model;

/**
 * Ulica pochôdzky — jeden riadok tabuľky streets. Stĺpec walk_id je cudzí kľúč na pochôdzku, do ktorej ulica patrí;
 * zmazaním pochôdzky zaniknú aj jej ulice.
 */
class Street extends Model
{
    protected ?int $id = null;
    protected ?int $walkId = null;
    protected ?string $name = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWalkId(): ?int
    {
        return $this->walkId;
    }

    /**
     * Zaradí ulicu do pochôdzky: pri pridaní ulice aj pri jej presune do inej pochôdzky.
     */
    public function setWalkId(int $walkId): void
    {
        $this->walkId = $walkId;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Pochôdzka, do ktorej ulica patrí. Framework ju nájde podľa stĺpca walk_id; pri uliciach z jedného zoznamu
     * načíta pochôdzky všetkých ulíc naraz.
     */
    public function getWalk(): ?Walk
    {
        return $this->getOneRelated(Walk::class);
    }
}
