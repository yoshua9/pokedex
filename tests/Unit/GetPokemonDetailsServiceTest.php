<?php

namespace Unit;

use Tests\TestCase;
use App\Application\UseCases\Pokemon\Services\GetPokemonDetailsService;
use App\Domain\Pokemon\Repositories\PokemonRepositoryInterface;
use App\Domain\Pokemon\Entities\Pokemon;
use App\Domain\Pokemon\Enums\PokemonType;
use App\Domain\Pokemon\Enums\PokemonStatus;
use App\Application\UseCases\Pokemon\DTOs\PokemonOutputDTO;
use App\Domain\Pokemon\Exceptions\PokemonNotFoundException;

class GetPokemonDetailsServiceTest extends TestCase
{
    public function test_execute_returns_output_dto_when_found()
    {
        $pokemon = new Pokemon(
            name: 'Charmander',
            type: PokemonType::from('Fire'),
            hp: 39,
            status: PokemonStatus::from('wild')
        );
        $pokemon->setId(1);

        $repoMock = $this->createMock(PokemonRepositoryInterface::class);
        $repoMock->expects($this->once())
            ->method('find')
            ->with(1)
            ->willReturn($pokemon);

        $service = new GetPokemonDetailsService($repoMock);
        $result = $service->execute(1);

        $this->assertInstanceOf(PokemonOutputDTO::class, $result);
        $this->assertEquals(1, $result->id);
        $this->assertEquals('Charmander', $result->name);
        $this->assertEquals(PokemonType::from('Fire'), $result->type);
        $this->assertEquals(39, $result->hp);
        $this->assertEquals(PokemonStatus::from('wild'), $result->status);
    }

    public function test_execute_throws_exception_when_not_found()
    {
        $repoMock = $this->createMock(PokemonRepositoryInterface::class);
        $repoMock->expects($this->once())
            ->method('find')
            ->with(999)
            ->willReturn(null);

        $service = new GetPokemonDetailsService($repoMock);

        $this->expectException(PokemonNotFoundException::class);
        $this->expectExceptionMessage('Pokemon with id 999 not found.');

        $service->execute(999);
    }
}

