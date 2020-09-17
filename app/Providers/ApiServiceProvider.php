<?php

namespace App\Providers;

use App\Http\Controllers\FilmController;
use App\Http\Controllers\PeopleController;
use App\Services\Api;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class ApiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('apigblix', function (){
            return new Api();
        });
        App::bind('film', function (){
            return new FilmController();
        });
        App::bind('people', function (){
            return new PeopleController();
        });


    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
