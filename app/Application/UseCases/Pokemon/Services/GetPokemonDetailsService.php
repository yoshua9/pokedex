<?php

namespace App\Application\UseCases\Pokemon\Services;

use App\Application\UseCases\Pokemon\DTOs\PokemonOutputDTO;
use App\Domain\Pokemon\Repositories\PokemonRepositoryInterface;
use InvalidArgumentException;
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
            throw new InvalidArgumentException('Pokemon not found');
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
