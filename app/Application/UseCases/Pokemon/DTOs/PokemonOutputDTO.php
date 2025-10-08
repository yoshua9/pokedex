<?php

namespace App\Application\UseCases\Pokemon\DTOs;

use App\Domain\Pokemon\Enums\PokemonStatus;
use App\Domain\Pokemon\Enums\PokemonType;

class PokemonOutputDTO
{
    public function __construct(
        public int $id,
        public string $name,
        public PokemonType $type,
        public int $hp,
        public PokemonStatus $status,
    ) {}
}
