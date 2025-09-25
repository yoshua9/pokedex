<?php

namespace App\Application\UseCases\Pokemon\Mappers;

use app\Domain\Pokemon\Entities\Pokemon;
use App\Infrastructure\Persistence\Eloquent\Models\Pokemon as EloquentPokemon;

class PokemonMapper
{
    public static function toDomain(EloquentPokemon $eloquentPokemon): Pokemon
    {
        $pokemon = new Pokemon(
            name: $eloquentPokemon->name,
            type: $eloquentPokemon->type,
            hp: $eloquentPokemon->hp,
            status: $eloquentPokemon->status
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
            'type'   => $pokemon->getType(),
            'hp'     => $pokemon->getHp(),
            'status' => $pokemon->getStatus(),
        ]);
    }
}
