<?php

namespace App\Http\Controllers;

use App\Actions\Jetstream\DeleteTeam;
use App\Jobs\Send;


use App\Jobs\Telegram;
use Illuminate\Http\Request;

class TController extends Controller
{
    public function index(Request $request){

        $job = (new Telegram("mesaj", '+40726459188'));
        dispatch($job);


    }
}

