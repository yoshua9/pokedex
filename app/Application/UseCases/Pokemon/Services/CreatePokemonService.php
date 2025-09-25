<?php

namespace App\Application\UseCases\Pokemon\Services;

use App\Application\UseCases\Pokemon\DTOs\CreatePokemonDTO;
use App\Domain\Pokemon\Repositories\PokemonRepositoryInterface;
use App\Domain\Pokemon\Entities\Pokemon;
use Exception;

class CreatePokemonService
{
    private PokemonRepositoryInterface $pokemonRepository;

    public function __construct(PokemonRepositoryInterface $pokemonRepository)
    {
        $this->pokemonRepository = $pokemonRepository;
    }

    /**
     * @throws Exception
     */
    public function execute(CreatePokemonDTO $pokemonDTO): Pokemon
    {
        $pokemon = new Pokemon(
            name: $pokemonDTO->name,
            type: $pokemonDTO->type,
            hp: $pokemonDTO->hp,
            status: $pokemonDTO->status
        );

       return $this->pokemonRepository->create($pokemon);
    }
}
