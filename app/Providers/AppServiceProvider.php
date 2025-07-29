<?php

namespace App\Providers;

use App\Contracts\{
    IProductService,
    ICategoryService
};
use App\Services\{
    CategoryService,
    ProductService
};
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(ICategoryService::class, CategoryService::class);
        $this->app->bind(IProductService::class, ProductService::class);
    }
}
