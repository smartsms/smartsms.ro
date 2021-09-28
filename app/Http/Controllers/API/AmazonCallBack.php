<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Jobs\Send;
use Illuminate\Http\Request;



class AmazonCallBack extends Controller
{
    public function index(Request $request){
       	logger($request->all());
        $json = json_decode($request);

        if($request->Type == 'SubscriptionConfirmation'){
                file_get_content($json->SubscribeURL);
        }


        return $json;

    }




}
