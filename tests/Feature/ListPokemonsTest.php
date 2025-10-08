<?php

namespace Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Infrastructure\Persistence\Eloquent\Models\Pokemon;

class ListPokemonsTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_returns_a_list_of_pokemons()
    {
        Pokemon::factory()->create([
            'name' => 'Pikachu',
            'type' => 'Electric',
            'hp' => 35,
            'status' => 'captured',
        ]);

        Pokemon::factory()->create([
            'name' => 'Bulbasaur',
            'type' => 'Grass',
            'hp' => 45,
            'status' => 'wild',
        ]);

        $response = $this->getJson('/api/pokemon');

        $response->assertOk();
        $response->assertJsonCount(2, 'data');
        $response->assertJsonStructure([
            'data' => [
                '*' => ['id', 'name', 'type', 'hp', 'status'],
            ],
        ]);

        $response->assertJsonFragment(['name' => 'Pikachu']);
        $response->assertJsonFragment(['name' => 'Bulbasaur']);
    }
}
