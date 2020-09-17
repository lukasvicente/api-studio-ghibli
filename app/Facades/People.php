<?php


namespace App\Facades;

use Illuminate\Support\Facades\Facade;


class People extends  Facade
{
    protected static function getFacadeAccessor()
    {
        return 'people';
    }
}
