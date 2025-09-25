<?php

namespace Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreatePokemonTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_creates_a_pokemon_successfully()
    {
        $payload = [
            'name'   => 'Pikachu',
            'type'   => 'Electric',
            'hp'     => 35,
            'status' => 'captured',
        ];

        $response = $this->postJson('/api/pokemon', $payload);

        $response->assertStatus(201)
            ->assertJsonFragment([
                'name'   => 'Pikachu',
                'type'   => 'Electric',
                'hp'     => 35,
                'status' => 'captured',
            ]);

        $this->assertDatabaseHas('pokemons', [
            'name'   => 'Pikachu',
            'type'   => 'Electric',
            'hp'     => 35,
            'status' => 'captured',
        ]);
    }
}
