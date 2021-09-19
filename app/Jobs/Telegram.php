<?php

namespace App\Jobs;

use danog\MadelineProto\API;
use danog\MadelineProto\Settings\Database\Mysql;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use function Symfony\Component\String\s;

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
//            $job = (new Telegram($message, $phone));
//            dispatch($job);


        $message = $this->message;
        $number = $this->number;

        $settings['app_info']['api_id']='8045583';
        $settings['app_info']['api_hash']='8ee4857e5c89147022566f53dc97ff39';


        $settings = (new \danog\MadelineProto\Settings\Database\Mysql)
            ->setUri('tcp://localhost')
            ->setUsername(env('DB_USERs', 'forge'))
            ->setPassword(env('DB_PASSWORD', 'forge'))
            ->setDatabase(env('DB_DATABASEs', 'forge'));

        $telegram = new \danog\MadelineProto\API('madeline', $settings);

        $telegram->async(true);

            $telegram->loop(function () use ($telegram) {

                $messages = $telegram->messages->sendMessage([
                    'peer' => '@drgutman',
                     'message' => "SAlut ce faci?". rand(1, 99999)
                ]);

    });


    }
}
