<?php

namespace App\Application\UseCases\Pokemon\Services;

use App\Application\UseCases\Pokemon\DTOs\PokemonOutputDTO;
use App\Domain\Pokemon\Repositories\PokemonRepositoryInterface;

class ListPokemonsService
{
    private PokemonRepositoryInterface $pokemonRepository;

    public function __construct(PokemonRepositoryInterface $pokemonRepository)
    {
        $this->pokemonRepository = $pokemonRepository;
    }

    public function execute(): array
    {
        $pokemons = $this->pokemonRepository->all();

        return array_map(fn($pokemon) =>
            new PokemonOutputDTO(
                id: $pokemon->getId(),
                name: $pokemon->getName(),
                type: $pokemon->getType(),
                hp: $pokemon->getHp(),
                status: $pokemon->getStatus()
            ), $pokemons);
    }
}
