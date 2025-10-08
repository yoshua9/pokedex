<?php

namespace App\Domain\Pokemon\Repositories;

use App\Domain\Pokemon\Entities\Pokemon;

interface PokemonRepositoryInterface
{
    public function all(): array;

    public function find(int $pokemonId): ?Pokemon;

    public function create(Pokemon $pokemon): Pokemon;
}
