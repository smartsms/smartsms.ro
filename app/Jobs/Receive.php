<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class Receive implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Request $request)
    {
        logger($request->all());
        //exit();
//        $gatewayMessageUuid = $gatewayData->id;
//
//        $endpoint = config('gateways.netopia.domain').config('gateways.netopia.path');
//        $apiKey = config('gateways.netopia.default.apikey');
//        $secret = config('gateways.netopia.default.secret');
//        $nonce = time();
//
//        $string = $apiKey.$nonce.'GET'.config('gateways.netopia.path').$gatewayMessageUuid.$secret;
//        $signature = hash('sha512', $string);
//
//        try {
//            $request = (new Guzzle)->request('GET', $endpoint, [
//                'headers' => [
//                    'User-Agent' => config('smso.user-agent'),
//                    'Content-type' => 'application/json',
//                    'Authorization' => 'Basic ' . base64_encode($apiKey . ':' . $signature),
//                ],
//                'json' => [
//                    'apiKey' => $apiKey,
//                    'id' => $gatewayMessageUuid,
//                    'nonce' => $nonce,
//                ],
//            ]);
//
//            //logger()->debug($request->getBody()->getContents());
//
//            $gatewayContent = json_decode($request->getBody()->getContents());
//
//            if (json_last_error() === 0) {
//                $messageDeliveryTime = null;
//                if (optional($gatewayContent)->delivery_time) {
//                    $messageDeliveryTime = Carbon::createFromFormat('Y-m-d H:i:s', $gatewayContent->deliveryDatetime, 'Europe/Bucharest')
//                                                 ->setTimezone('UTC');
//                }
//
//                $statusMap = [
//                    '0' => 'sent',
//                    '1' => 'sent',
//                    '2' => 'delivered',
//                    '3' => 'sent',
//                    '4' => 'error',
//                    '5' => 'expired',
//                    '6' => 'expired',
//                    '8' => 'error',
//                    '13' => 'error',
//                    '14' => 'error',
//                    '16' => 'error',
//                ];
//
//                $messageStatus = $statusMap[$gatewayContent->status];
//                $message = Log::where('uuid', $dlr->uuid)->first();
//                $message->status = $messageStatus;
//
//                if ($messageStatus === 'sent') {
//                    $message->sent_at = $messageDeliveryTime;
//                }
//
//                if ($messageStatus === 'delivered') {
//                    $message->delivered_at = $messageDeliveryTime;
//                    if( is_null($messageDeliveryTime)){
//                        $message->delivered_at = now();
//                    }
//
//                }
//                $message->save();
//
//                if ($message->status !== 'sent') {
//                    $dlr->delete();
//                }
//            }
//
//        } catch (\Exception $exception) {
//            $exceptionText = [
//                'status' => $exception->hasResponse() ? $exception->getResponse()->getStatusCode() : $exception->getCode(),
//                'type' => get_class($exception),
//                'body' => $exception->hasResponse() ? json_decode($exception->getResponse()->getBody()->getContents(), true) : null,
//            ];
//
//
//            $gatewayMessage = config('gateways.netopia.error-messages.'.$exceptionText['body']['message']);
//
//            $statusDetails = [];
//            $statusDetails['message'] =  $gatewayMessage;
//            $statusDetails['details'] = $exceptionText;
//
//            $message = Log::where('uuid', $dlr->uuid)->first();
//            $message->status_details = json_encode(optional($statusDetails));
//            $message->status = 'error';
//            $message->save();
//        }
    }
}
