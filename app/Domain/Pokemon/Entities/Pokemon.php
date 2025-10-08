<?php

namespace App\Domain\Pokemon\Entities;

use App\Domain\Pokemon\Enums\PokemonType;
use App\Domain\Pokemon\Enums\PokemonStatus;

class Pokemon
{
    private ?int $id = null;

    public function __construct(
        private string $name,
        private PokemonType $type,
        private int $hp,
        private PokemonStatus $status
    ) {}

    // Getters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getType(): PokemonType
    {
        return $this->type;
    }

    public function getHp(): int
    {
        return $this->hp;
    }

    public function getStatus(): PokemonStatus
    {
        return $this->status;
    }

    // Setters
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setType(PokemonType $type): void
    {
        $this->type = $type;
    }

    public function setHp(int $hp): void
    {
        $this->hp = $hp;
    }

    public function setStatus(PokemonStatus $status): void
    {
        $this->status = $status;
    }
}
