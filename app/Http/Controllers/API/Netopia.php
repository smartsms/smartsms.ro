<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Aws\Common\Enum\Region;


class Netopia extends Controller
{
    public function callback(Request $request){
        return 'ok';
    }


    public function webhook(Request $request){

        $xml = '<reply_message
                operation="free"
                reply="1"
                error_code="0">'.$request->message.' nu avem dar avem o gluma: +40317100085 (tarif normal).</reply_message>';
        ///logger($request->all());
        return response($xml, 200)
            ->header('Content-Type', 'application/xml')
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
            ->header('Cache-Control', 'post-check=0, pre-check=0')
            ->header('Pragma', 'no-cache');

    }




}
