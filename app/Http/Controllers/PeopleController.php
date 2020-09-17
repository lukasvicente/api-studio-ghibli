<?php

namespace App\Http\Controllers;

use App\Facades\ApiGblix;
use App\People;
use Illuminate\Http\Request;
use League\Csv\Writer;

class PeopleController extends Controller
{

    public function show(Request $request)
    {
        try {

            $people = People::with('film')
                ->get()
                ->all();

            if ($request->type == 'json')
            {

                return response()->json(["Personagens" => $people]);

            }
            elseif ($request->type == 'csv')
            {
                $csv = Writer::createFromFileObject(new \SplTempFileObject());
                $csv->insertOne([
                    'name',
                    'age',
                    'film',
                    'release_date',
                    'score'
                ]);

                foreach ( $people as $value){
                    foreach ($value->film as $film){

                        $csv->insertOne([
                            $value->name,
                            $value->age,
                            $film->title,
                            $film->release_date,
                            $film->rt_score,

                        ]);

                    }
                }
                $csv->output('people.csv');
                //return response()->json($request->type);

            }else{

                return response()->json(['Export type not found'], 400);

            }


        }catch (\Exception $e) {

            return response()->json([$e], 400);

        }

    }

    public function index()
    {
        $people = People::with('film')
            ->get();

        return view('gblix.people.index', compact('people'));
    }


    public function store()
    {

        try {

            $people = ApiGblix::getEndPoint('people');

            foreach ($people as $value){

                $data = ([
                    'id' => $value->id,
                    'name' => $value->name,
                    'gender' => $value->gender,
                    'age' => $value->age,
                    'eye_color' => $value->eye_color,
                    'hair_color' => $value->hair_color,
                    'films' => $value->films,


                ]);
                People::create($data);

            }

            $response = array('status' => 'sucess insert people');

            return $response;

        }catch (\Exception $e){

            $response = array('status' => 'fail insert people', 'error' => $e->getMessage());


            return $response;

        }


    }
}
