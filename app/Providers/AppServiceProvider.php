<?php

namespace App\Providers;

use Faker;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        //не тестировал
        //создаёт локализованный для русского языка экземпляр класса Faker.
        Faker\Factory::create('ru_Ru');
    }
}
