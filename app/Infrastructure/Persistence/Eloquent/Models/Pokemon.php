<?php

namespace App\Infrastructure\Persistence\Eloquent\Models;

use Database\Factories\PokemonFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Pokemon extends Model
{
    use HasFactory;

    protected $table = 'pokemons';

    protected $fillable = [
        'name',
        'type',
        'hp',
        'status',
    ];

    protected static function newFactory()
    {
        return PokemonFactory::new();
    }
}
