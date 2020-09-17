<?php


namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class ApiGblix extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'apigblix';
    }
}
