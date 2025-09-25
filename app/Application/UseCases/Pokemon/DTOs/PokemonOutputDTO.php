<?php

namespace App\Application\UseCases\Pokemon\DTOs;

class PokemonOutputDTO
{
    public function __construct(
        public int $id,
        public string $name,
        public string $type,
        public int $hp,
        public string $status,
    ) {}
}
