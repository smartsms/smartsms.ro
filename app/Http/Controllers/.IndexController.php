<?php

namespace App\Http\Controllers;

use App\Jobs\Send;
use Illuminate\Http\Request;



class IndexController extends Controller
{
    public function index(Request $request){
        //return view('index');

    }

     public function q(Request $request){

        $message = urldecode($request->m);
        $phone = $request->p;
        $job = (new Send($message, $phone));
        dispatch($job);

            return "message sent!";

    }

    public function callback(Request $request){



    }


}
