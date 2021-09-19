<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class Send implements ShouldQueue
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

        $message = $this->message;
        $number = $this->number;

        $sender = '1704';

        $callbackUrl = route('netopia-callback');

        $apiKey = config('gateways.netopia.2way.apikey');

        $visibleMessage = $message;
        $scheduleDate = '';
        $validityDate = now()->addDays(10)->timestamp;
        $nonce = time();

        $hashParts = config('gateways.netopia.2way.apikey') . $nonce . "POST" . config('gateways.netopia.path') .
                     $sender . $number . $message . $visibleMessage .
                     $scheduleDate . $validityDate .
                     $callbackUrl . config('gateways.netopia.2way.secret');

        $signature = hash('sha512', $hashParts);


        $endpoint = config('gateways.netopia.domain').config('gateways.netopia.path');


        try {
            $client = new \GuzzleHttp\Client();
            $request = $client->request('POST', $endpoint, [
                'headers' => [
                    //'User-Agent' => config('smso.user-agent'),
                    'Content-type' => 'application/json',
                    'Authorization' => 'Basic ' . base64_encode($apiKey . ':' . $signature),
                ],
                'json' => [
                    'apiKey' => $apiKey,
                    'sender' => $sender,
                    'recipient' => $number,
                    'message' => $message,
                    'scheduleDatetime' => $scheduleDate,
                    'validityDatetime' => $validityDate,
                    'callbackUrl' => $callbackUrl,
                    'userData' => '',
                    'visibleMessage' => $visibleMessage,
                    'nonce' => $nonce,
                ],
            ]);

            if ($request->getStatusCode() === 201) {
                $requestContent = json_decode($request->getBody()->getContents(), true);
                if (json_last_error() === 0) {
                    logger($requestContent);
                    return;
                }
            }
        } catch (\Exception $exception) {
            echo ($exception->getMessage());
            //            $exceptionText = [
//                'status' => $exception->hasResponse() ? $exception->getResponse()->getStatusCode() : $exception->getCode(),
//                'type' => get_class($exception),
//                'body' => $exception->hasResponse() ? json_decode($exception->getResponse()->getBody()->getContents(), true) : null,
//            ];
//            logger($exception->getResponse()->getBody()->getContents());
//
//            $gatewayMessage = config('gateways.netopia.error-messages.'.$exceptionText['body']['message']);
//            logger()->warning($exceptionText);
//            $statusDetails = [
//               'message' => $exceptionText,
//               'error' => 'http-error',
//               'details' => $exceptionText,
//           ];
//            logger($statusDetails);
//            return;

        }

    }
}
