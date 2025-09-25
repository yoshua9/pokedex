<?php

namespace App\Providers;

use App\Domain\Pokemon\Repositories\PokemonRepositoryInterface;
use App\Infrastructure\Persistence\Eloquent\Repositories\PokemonRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            PokemonRepositoryInterface::class,
            PokemonRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
