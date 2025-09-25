<?php

use App\Infrastructure\Http\Controllers\Pokemon\ListPokemonsController;
use App\Infrastructure\Http\Controllers\Pokemon\GetPokemonDetailsController;
use App\Infrastructure\Http\Controllers\Pokemon\CreatePokemonController;
use Illuminate\Support\Facades\Route;

Route::prefix('pokemon')->group(function () {
    Route::get('/', ListPokemonsController::class)->name('pokemon.list');
    Route::get('/{id}', GetPokemonDetailsController::class)->name('pokemon.get');
    Route::post('/', CreatePokemonController::class)->name('pokemon.create');
});
