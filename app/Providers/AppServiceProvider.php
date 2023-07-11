<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Src\ShoppingCart\Domain\CartRepository;
use Src\ShoppingCart\Infraestructure\EloquentCartRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void{
        $this->app->bind(CartRepository::class, EloquentCartRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
