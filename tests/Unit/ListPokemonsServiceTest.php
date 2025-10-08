<?php

namespace Unit;

use Tests\TestCase;
use App\Application\UseCases\Pokemon\Services\ListPokemonsService;
use App\Domain\Pokemon\Repositories\PokemonRepositoryInterface;
use App\Domain\Pokemon\Entities\Pokemon;
use App\Domain\Pokemon\Enums\PokemonType;
use App\Domain\Pokemon\Enums\PokemonStatus;
use App\Application\UseCases\Pokemon\DTOs\PokemonOutputDTO;

class ListPokemonsServiceTest extends TestCase
{
    public function test_execute_returns_array_of_output_dtos()
    {
        $pokemon1 = new Pokemon(
            name: 'Pikachu',
            type: PokemonType::from('Electric'),
            hp: 35,
            status: PokemonStatus::from('captured')
        );
        $pokemon1->setId(1);

        $pokemon2 = new Pokemon(
            name: 'Bulbasaur',
            type: PokemonType::from('Grass'),
            hp: 45,
            status: PokemonStatus::from('wild')
        );
        $pokemon2->setId(2);

        $repoMock = $this->createMock(PokemonRepositoryInterface::class);
        $repoMock->expects($this->once())
            ->method('all')
            ->willReturn([$pokemon1, $pokemon2]);

        $service = new ListPokemonsService($repoMock);
        $result = $service->execute();

        $this->assertIsArray($result);
        $this->assertCount(2, $result);

        $dto1 = $result[0];
        $this->assertInstanceOf(PokemonOutputDTO::class, $dto1);
        $this->assertEquals(1, $dto1->id);
        $this->assertEquals('Pikachu', $dto1->name);
        $this->assertEquals(PokemonType::from('Electric'), $dto1->type);
        $this->assertEquals(35, $dto1->hp);
        $this->assertEquals(PokemonStatus::from('captured'), $dto1->status);

        $dto2 = $result[1];
        $this->assertInstanceOf(PokemonOutputDTO::class, $dto2);
        $this->assertEquals(2, $dto2->id);
        $this->assertEquals('Bulbasaur', $dto2->name);
        $this->assertEquals(PokemonType::from('Grass'), $dto2->type);
        $this->assertEquals(45, $dto2->hp);
        $this->assertEquals(PokemonStatus::from('wild'), $dto2->status);
    }
}

