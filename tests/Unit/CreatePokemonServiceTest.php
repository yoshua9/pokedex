<?php

namespace Unit;

use Tests\TestCase;
use App\Application\UseCases\Pokemon\Services\CreatePokemonService;
use App\Application\UseCases\Pokemon\DTOs\CreatePokemonDTO;
use App\Domain\Pokemon\Entities\Pokemon;
use App\Domain\Pokemon\Repositories\PokemonRepositoryInterface;

class CreatePokemonServiceTest extends TestCase
{
    public function test_execute_creates_pokemon_successfully()
    {
        $dto = new CreatePokemonDTO(
            name: 'Pikachu',
            type: 'Electric',
            hp: 35,
            status: 'captured'
        );

        $expectedPokemon = new Pokemon(
            name: 'Pikachu',
            type: 'Electric',
            hp: 35,
            status: 'captured'
        );
        $expectedPokemon->setId(1);

        $repoMock = $this->createMock(PokemonRepositoryInterface::class);

        $repoMock->expects($this->once())
            ->method('create')
            ->with($this->callback(function ($pokemon) {
                return $pokemon instanceof Pokemon
                    && $pokemon->getName() === 'Pikachu'
                    && $pokemon->getType() === 'Electric'
                    && $pokemon->getHp() === 35
                    && $pokemon->getStatus() === 'captured';
            }))
            ->willReturn($expectedPokemon);

        $service = new CreatePokemonService($repoMock);

        $result = $service->execute($dto);

        $this->assertInstanceOf(Pokemon::class, $result);
        $this->assertEquals(1, $result->getId());
        $this->assertEquals('Pikachu', $result->getName());
        $this->assertEquals('Electric', $result->getType());
        $this->assertEquals(35, $result->getHp());
        $this->assertEquals('captured', $result->getStatus());
    }
}
