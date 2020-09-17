<?php

namespace App\Http\Controllers;

use App\Facades\ApiGblix;
use App\FilmHasPeople;
use Illuminate\Http\Request;

class FilmHasPeopleController extends Controller
{
    public function store()
    {

        try {

            $people = ApiGblix::getEndPoint('people');

            foreach ($people as $value){

                foreach ( $value->films as $film ){

                    $data = ([

                        'films_id' => substr($film,-36),
                        'peoples_id' => $value->id,
                    ]);

                   FilmHasPeople::insert($data);

                }

            }

            $response = array('status' => 'sucess insert pivot FilmsHasPeople');

            return $response;

        }catch (\Exception $e){

            $response = array('status' => 'fail insert pivot FilmsHasPeople', 'error' => $e->getMessage());


            return $response;

        }


    }
}
