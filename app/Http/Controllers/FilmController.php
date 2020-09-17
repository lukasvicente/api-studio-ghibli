<?php

namespace App\Http\Controllers;

use App\Facades\ApiGblix;
use App\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{

    public function store()
    {

        try {

            $films = ApiGblix::getEndPoint('films');

            foreach ($films as $value){

                $data = ([
                    'id' => $value->id,
                    'title' => $value->title,
                    'description' => $value->description,
                    'director' => $value->director,
                    'producer' => $value->producer,
                    'release_date' => $value->release_date,
                    'rt_score' => $value->rt_score,

                ]);

                Film::create($data);

            }

            $response = array('status' => 'sucess insert films');

            return $response;

        }catch (\Exception $e){

            $response = array('status' => 'fail insert films', 'error' => $e->getMessage());


            return $response;

        }


    }
}
