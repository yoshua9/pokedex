<?php

namespace app\Domain\Pokemon\Repositories;

use app\Domain\Pokemon\Entities\Pokemon;

interface PokemonRepositoryInterface
{
    public function all(): array;

    public function find(int $pokemonId): ?Pokemon;

    public function create(Pokemon $pokemon): Pokemon;
}
