<?php

namespace App\Jobs;

use danog\MadelineProto\API;
use danog\MadelineProto\Logger;
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

        $sessionFile = 't/session.madeline';
        if(file_exists( $sessionFile ) ) {
            $telegram = new API($sessionFile);
        } else {
            $telegram = new API([
                'app_info' => [
                    'api_id'   => '8045583',
                    'api_hash' => '8ee4857e5c89147022566f53dc97ff39',
                ],
                'logger' => [

                    'logger_param' => storage_path('MadelineProto.log'),

                ],
            ]);
        }
//$telegram->start();
//dd($telegram->help->getPromoData);

//$inputContacts = [];
////$inputContacts[0] = ['_' => 'inputPhoneContact', 'client_id' => 0, 'phone' => '+40737758618', 'first_name' => '', 'last_name' => '', ];
//$inputContacts[1] = ['_' => 'inputPhoneContact', 'client_id' => 0, 'phone' => '++40 (753) 629 469', 'first_name' => '', 'last_name' => '', ];
////////
////////
// $x = $telegram->contacts->importContacts(['contacts' => $inputContacts]);
////$x = $telegram->contacts->importContacts(['contacts' => $inputContacts]);
//////
//dd($x);



       $messageId = $telegram->messages->sendMessage([
           'id' => rand(1, 9999),
           'peer' => '@necenzurat',
           'message' => "Hi!\nThanks for creating MadelineProto! <3"
       ]);
        dd($messageId);


    }
}
