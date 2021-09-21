<?php

namespace App\Jobs;


use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;


class Telegram implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $message;
    protected $number;
    public $timeout = 240;
    public $tries = 1;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($message, $number)
    {
        $this->message = $message;
        $this->number = $number;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {


//            $phone = "+40726459188";
//
//            $message = "yey";
//
//            $job = (new Telegram($message, $phone));T
//            dispatch($job);


        $message = $this->message;
        $number = $this->number;

//                $messages = $telegram->messages->sendMessage([
//                    'peer' => '@rostefan',
//                     'message' => "SAlut ce faci?". rand(1, 99999)
//                ]);
                $settings['app_info']['api_id']='8045583';
                $settings['app_info']['api_hash']='8ee4857e5c89147022566f53dc97ff39';


            $MadelineProto = new \danog\MadelineProto\API('telegram/session.madeline', $settings);

        dd($MadelineProto);
//        $me = $MadelineProto->start();
$MadelineProto->messages->sendMessage(['peer' => '@rostefan', 'message' => "Hi!\nThanks for creating MadelineProto! <3"]);
        echo 'OK, done!'.PHP_EOL;


    }
}
