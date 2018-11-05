<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;
use Exception;
use Validator;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string',
            'state_id' => 'required'
        ]);

        if($validate->fails())
        {
            return $this->errorResponse($validate->errors());
        }

        try{
            $city = new City;
            $city->name = $request->input('name');
            $city->state_id = $request->input('state_id');
            $city->save();

            $city->states()->attach($request->input('state_id'));
            return $this->successResponse('City Created');
        }
        catch (Exception $exception){
            return $this->errorResponse('failed');
        }
    }


}
