<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class Lycamobile extends Controller
{
    public function index(Request $request){
        logger($request->all());
    }
}
