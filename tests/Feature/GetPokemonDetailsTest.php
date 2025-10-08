<?php

namespace Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Infrastructure\Persistence\Eloquent\Models\Pokemon as EloquentPokemon;

class GetPokemonDetailsTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_returns_pokemon_details_if_exists()
    {
        $pokemon = EloquentPokemon::factory()->create([
            'name' => 'Charmander',
            'type' => 'Fire',
            'hp' => 39,
            'status' => 'wild',
        ]);

        $response = $this->getJson("/api/pokemon/{$pokemon->id}");

        $response->assertOk()
            ->assertJsonPath('data.id', $pokemon->id)
            ->assertJsonPath('data.name', 'Charmander')
            ->assertJsonPath('data.type', 'Fire')
            ->assertJsonPath('data.hp', 39)
            ->assertJsonPath('data.status', 'wild');
    }

    public function test_it_returns_404_if_pokemon_not_found()
    {
        $response = $this->getJson('/api/pokemon/999');

        $response->assertStatus(404)
            ->assertJson([
                'error' => 'Pokemon with id 999 not found.'
            ]);
    }
}

