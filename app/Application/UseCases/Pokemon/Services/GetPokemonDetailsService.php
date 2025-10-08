<?php

namespace App\Application\UseCases\Pokemon\Services;

use App\Domain\Pokemon\Repositories\PokemonRepositoryInterface;
use App\Domain\Pokemon\Exceptions\PokemonNotFoundException;
use App\Application\UseCases\Pokemon\DTOs\PokemonOutputDTO;

class GetPokemonDetailsService
{
    private PokemonRepositoryInterface $pokemonRepository;

    public function __construct(PokemonRepositoryInterface $pokemonRepository)
    {
        $this->pokemonRepository = $pokemonRepository;
    }

    public function execute(int $pokemonId): ?PokemonOutputDTO
    {
        $pokemon = $this->pokemonRepository->find($pokemonId);

        if (!$pokemon) {
            throw new PokemonNotFoundException($pokemonId);
        }

        return new PokemonOutputDTO(
            id: $pokemon->getId(),
            name: $pokemon->getName(),
            type: $pokemon->getType(),
            hp: $pokemon->getHp(),
            status: $pokemon->getStatus()
        );
    }
}
