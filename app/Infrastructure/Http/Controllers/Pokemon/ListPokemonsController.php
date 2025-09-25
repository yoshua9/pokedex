<?php

namespace App\Infrastructure\Http\Controllers\Pokemon;

use App\Application\UseCases\Pokemon\Services\ListPokemonsService;
use Illuminate\Http\JsonResponse;

class ListPokemonsController
{
    private ListPokemonsService $listPokemonsService;

    public function __construct(ListPokemonsService $listPokemonsService)
    {
        $this->listPokemonsService = $listPokemonsService;
    }

    public function __invoke(): JsonResponse
    {
        try {
            $pokemons = $this->listPokemonsService->execute();

            return response()->json([
                'data' => $pokemons,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to retrieve pokemons'], 500);
        }
    }
}
