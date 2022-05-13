<?php

namespace App\Http\Controllers\cities;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\city;

class Citiescontroller extends Controller
{
    public function stateLoc()
    {

        $states = city::select('state_code')->distinct()->get();

        echo'<option>STATE</option>';
        foreach($states as $state)
        {

            echo"<option>$state->state_code</option>";

        }
    }


    public function citesLoc(Request $request)
    {

        $cities = city::select('city')->where('state_code',$request->state)->get();
     
        foreach($cities as $city)
        {

            echo"<option>$city->city</option>";

        }


    }



}
