<?php

namespace App\Infrastructure\Http\Controllers\Pokemon;

use App\Application\UseCases\Pokemon\services\GetPokemonDetailsService;
use Illuminate\Http\JsonResponse;
use InvalidArgumentException;
use Exception;
class GetPokemonDetailsController
{
    private GetPokemonDetailsService $getPokemonDetailsService;

    public function __construct(GetPokemonDetailsService $getPokemonDetailsService)
    {
        $this->getPokemonDetailsService = $getPokemonDetailsService;
    }

    public function __invoke(int $id): JsonResponse
    {
        try {
            $pokemonDetails = $this->getPokemonDetailsService->execute($id);
            return response()->json([
                'data' => $pokemonDetails
            ]);
        } catch (InvalidArgumentException $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to retrieve pokemon details'], 500);
        }
    }
}
