<?php

namespace App\Infrastructure\Http\Controllers\Pokemon;

use App\Application\UseCases\Pokemon\DTOs\CreatePokemonDTO;
use App\Application\UseCases\Pokemon\Services\CreatePokemonService;
use App\Infrastructure\Http\Request\Pokemon\CreatePokemonRequest;
use Illuminate\Http\JsonResponse;
use Exception;

class CreatePokemonController
{
    private CreatePokemonService $createPokemonService;

    public function __construct(CreatePokemonService $createPokemonService)
    {
        $this->createPokemonService = $createPokemonService;
    }

    public function __invoke(CreatePokemonRequest $request): JsonResponse
    {
        try {
            $createPokemonDTO = new CreatePokemonDTO(
                name: $request->validated('name'),
                type: $request->validated('type'),
                hp: $request->validated('hp'),
                status: $request->validated('status')
            );

            $pokemonSaved = $this->createPokemonService->execute($createPokemonDTO);

            return response()->json([
                'message' => 'Pokemon created successfully',
                'pokemon' => [
                    'id' => $pokemonSaved->getId(),
                    'name' => $pokemonSaved->getName(),
                    'type' => $pokemonSaved->getType(),
                    'hp' => $pokemonSaved->getHp(),
                    'status' => $pokemonSaved->getStatus(),
                ],
            ], 201);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to create pokemon'], 500);
        }
    }
}
