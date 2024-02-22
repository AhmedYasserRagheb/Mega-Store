<?php

namespace App\Providers;

use App\Models\product;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
// use Illuminate\database\Eloquent\Collection\link;

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
        paginator::useBootstrapFive();
        // $product = product::all();
    }
}
