<?php

namespace App\Domain\Pokemon\Enums;

enum PokemonStatus: string
{
    case WILD = 'wild';
    case CAPTURED = 'captured';
}

