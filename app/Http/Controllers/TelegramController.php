<?php

namespace App\Http\Controllers;

use App\Actions\Jetstream\DeleteTeam;
use App\Jobs\Send;


use App\Jobs\Telegram;
use Illuminate\Http\Request;

class TelegramController extends Controller
{
    public function index(Request $request){

        $job = (new Telegram(["mesaj", '+40726459188', 'forward_sender_name'=> 'NU VREAU!']));
        dispatch($job);


    }
}
