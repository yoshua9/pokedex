<?php

namespace Database\Factories;

use App\Infrastructure\Persistence\Eloquent\Models\Pokemon;
use Illuminate\Database\Eloquent\Factories\Factory;

class PokemonFactory extends Factory
{
    protected $model = Pokemon::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'type' => $this->faker->randomElement([
                'Fire', 'Water', 'Grass', 'Electric', 'Psychic'
            ]),
            'hp' => $this->faker->numberBetween(10, 100),
            'status' => $this->faker->randomElement(['wild', 'captured']),
        ];
    }
}
