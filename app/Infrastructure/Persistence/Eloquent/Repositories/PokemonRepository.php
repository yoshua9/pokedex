<?php

namespace App\Infrastructure\Persistence\Eloquent\Repositories;

use App\Application\UseCases\Pokemon\Mappers\PokemonMapper;
use App\Domain\Pokemon\Repositories\PokemonRepositoryInterface;
use App\Infrastructure\Persistence\Eloquent\Models\Pokemon as EloquentPokemon;
use App\Domain\Pokemon\Entities\Pokemon;

class PokemonRepository implements PokemonRepositoryInterface
{
    public function all(): array
    {
        return EloquentPokemon::all()->map(fn($eloquentPokemon) =>
            PokemonMapper::toDomain($eloquentPokemon)
        )->toArray();
    }

    public function find(int $pokemonId): ?Pokemon
    {
        $eloquentPokemon = EloquentPokemon::find($pokemonId);
        return $eloquentPokemon ? PokemonMapper::toDomain($eloquentPokemon) : null;
    }

    public function create(Pokemon $pokemon): Pokemon
    {
        $eloquentPokemon = PokemonMapper::toEloquent($pokemon);
        $eloquentPokemon->save();

        return PokemonMapper::toDomain($eloquentPokemon);
    }
}
