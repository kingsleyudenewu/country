<?php

namespace App\Http\Controllers;

use App\Country;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Validator;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getCountry = Country::all();
        if(!$getCountry) return $this->errorResponse('No record available');
        return $this->successResponse('success', $getCountry);
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
            'name' => 'required|string'
        ]);

        if($validate->fails())
        {
            return $this->errorResponse($validate->errors());
        }

        try{
            $countryData = [
                'name' => $request->input('name')
            ];

            $saveCountry = Country::create($countryData);
            if($saveCountry){
                return $this->successResponse('Country Created');
            }
            else return $this->errorResponse('failed');
        }
        catch (QueryException $queryException){
            return $this->errorResponse('Operation failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function fetchCity(Request $request, $country)
    {

        $getCountry = Country::where('name', $country)->first();

        if($getCountry){
            $getCities = $getCountry->cities()->get();
            return $this->successResponse('success', $getCities);
        }
        else{
            return $this->errorResponse('Country does not exist');
        }
    }
}
