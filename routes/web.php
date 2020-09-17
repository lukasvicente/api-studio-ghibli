<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('gblix.home');
})->name('gblix.home');

Route::get('/test', function (){
    return \App\Facades\Film::store();
});

Route::get('film', 'FilmHasPeopleController@store');
Route::get('pessoas', 'PeopleController@index')->name('gblix.people');
Route::get('pessoas/export/{type}', 'PeopleController@show')->name('gblix.people.type');

