<?php

namespace App\Infrastructure\Persistence\Eloquent\Models;

use Illuminate\Database\Eloquent\Model;
class Pokemon extends Model
{
    protected $table = 'pokemons';

    protected $fillable = [
        'name',
        'type',
        'hp',
        'status',
    ];
}
