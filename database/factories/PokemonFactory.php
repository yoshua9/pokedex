<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Infrastructure\Persistence\Eloquent\Models\Pokemon as EloquentPokemon;

class PokemonFactory extends Factory
{
    protected $model = EloquentPokemon::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word(),
            'type' => $this->faker->randomElement(['Electric','Fire','Water','Grass','Psychic']),
            'hp' => $this->faker->numberBetween(1, 100),
            'status' => $this->faker->randomElement(['wild','captured']),
        ];
    }
}
