<?php

namespace App\Application\UseCases\Pokemon\DTOs;

class CreatePokemonDTO
{
    public function __construct(
        public string $name,
        public string $type,
        public int $hp,
        public string $status,
    ) {}
}
