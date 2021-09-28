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
        $settings = [
            'app_info' => [
                    'api_id'   => '8045583',
                    'api_hash' => '8ee4857e5c89147022566f53dc97ff39',
            ],
            'logger' => [
                    'logger_param' => '/tmp/MadelineProto.log',
            ]
         ];

        $sessionFile = '/tmp/session.madeline';
        if(file_exists( $sessionFile ) ) {
            $telegram = new API($sessionFile);
        } else {
            $telegram = new API($sessionFile, $settings);
        }


$inputContacts = [];
$inputContacts[] = ['_' => 'inputPhoneContact', 'client_id' => 0, 'phone' => '+40726502604', 'first_name' => '', 'last_name' => '', ];
$inputContacts[] = ['_' => 'inputPhoneContact', 'client_id' => 0, 'phone' => '+40722538897', 'first_name' => '', 'last_name' => '', ];
$inputContacts[] = ['_' => 'inputPhoneContact', 'client_id' => 0, 'phone' => '+40726459188', 'first_name' => '', 'last_name' => '', ];

$users = $telegram->contacts->importContacts(['contacts' => $inputContacts]);
    //dd($users);
foreach($users['users'] as $user) {

//$chatRooms = $telegram->messages->createChat(['users' => [$me['id'], '@drgutman'], 'title' => 'string', ]);
//dd($chatRooms);

     $messageId = $telegram->messages->sendMessage([
           'peer' => $user['id'],
           'message' => "Salut bro!",
       ]);
//     dd($messageId);

}

    }
}
