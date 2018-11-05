<?php

namespace App\Http\Controllers;

use App\State;
use Illuminate\Http\Request;
use Validator;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getState = State::all();
        if(!$getState) return $this->errorResponse('No record available');
        return $this->successResponse('success', $getState);
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
            'country_id' => 'required'
        ]);

        if($validate->fails())
        {
            return $this->errorResponse($validate->errors());
        }

        $stateData = [
            'name' => $request->input('name'),
            'country_id' => $request->input('country_id')
        ];

        $saveState = State::create($stateData);
        if($saveState){
            return $this->successResponse('State Created');
        }
        else return $this->errorResponse('failed');
    }
}
