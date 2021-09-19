<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Jobs\Send;
use Illuminate\Http\Request;



class AmazonCallbackController extends Controller
{
    public function index(Request $request){

        return $request->all();

    }




}
