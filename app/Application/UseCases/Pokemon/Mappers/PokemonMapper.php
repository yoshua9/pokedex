<?php

namespace App\Application\UseCases\Pokemon\Mappers;

use App\Domain\Pokemon\Entities\Pokemon;
use App\Domain\Pokemon\Enums\PokemonType;
use App\Domain\Pokemon\Enums\PokemonStatus;
use App\Infrastructure\Persistence\Eloquent\Models\Pokemon as EloquentPokemon;

class PokemonMapper
{
    public static function toDomain(EloquentPokemon $eloquentPokemon): Pokemon
    {
        $pokemon = new Pokemon(
            name: $eloquentPokemon->name,
            type: PokemonType::from($eloquentPokemon->type),
            hp: $eloquentPokemon->hp,
            status: PokemonStatus::from($eloquentPokemon->status)
        );

        if ($eloquentPokemon->id) {
            $pokemon->setId($eloquentPokemon->id);
        }

        return $pokemon;
    }

    public static function toEloquent(Pokemon $pokemon): EloquentPokemon
    {
        return new EloquentPokemon([
            'name'   => $pokemon->getName(),
            'type'   => $pokemon->getType()->value,
            'hp'     => $pokemon->getHp(),
            'status' => $pokemon->getStatus()->value,
        ]);
    }
}
