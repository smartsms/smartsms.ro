<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Jobs\Send;
use Illuminate\Http\Request;



class AmazonCallBack extends Controller
{
    public function index(Request $request){
       	$json = json_decode($request);
        if($request->Type == 'SubscriptionConfirmation')
            {
                file_get_contents_curl($json->SubscribeURL);
            }

        logger($json);
        return $json;

    }




}
