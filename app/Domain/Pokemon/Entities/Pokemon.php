<?php

namespace app\Domain\Pokemon\Entities;
class Pokemon
{
    private ?int $id = null;

    public function __construct(
        private string $name,
        private string $type,
        private int $hp,
        private string $status
    ) {}

    // Getters
    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getHp(): int
    {
        return $this->hp;
    }

    public function getStatus(): string
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

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function setHp(int $hp): void
    {
        $this->hp = $hp;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }
}
