<?php

namespace App\Domain\Pokemon\Exceptions;

use Exception;

class PokemonNotFoundException extends Exception
{
    public function __construct(int $pokemonId)
    {
        $message = "Pokemon with id {$pokemonId} not found.";
        parent::__construct($message);
    }
}
