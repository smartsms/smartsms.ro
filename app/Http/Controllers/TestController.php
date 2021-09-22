<?php

namespace App\Http\Controllers;

use App\Jobs\Send;
use Illuminate\Http\Request;
use Aws\Sns\SnsClient;
use Aws\Exception\AwsException;
class TestController extends Controller
{
    public function index(Request $request){



/**
 * Get the type of SMS Message sent by default from the AWS SNS service.
 *
 * This code expects that you have AWS credentials set up per:
 * https://docs.aws.amazon.com/sdk-for-php/v3/developer-guide/guide_credentials.html
 */

$SnSclient = new SnsClient([
    'profile' => 'default',
    'region' => 'eu-central-1',
    'version' => '2010-03-31'
]);




$phone = "+40737758618";

$message = "2 milioane de tine de malai.";
$topic = '';

$protocol = 'https';
$endpoint = 'https://';
        $result = $SnSclient->setTopicAttributes([
        'Message' => $message,
        'PhoneNumber' => $phone,
        'Protocol' => $protocol,
        'Endpoint' => $endpoint,
        'AttributeName' => "Policy | DisplayName | DeliveryPolicy",
        'AttributeValue' => 'First Topic',
        'ReturnSubscriptionArn' => true,
        'SenderID' => 'ING',
        //'TopicArn' => 'arn:aws:sns:eu-central-1:894666503115:2way-sms',
    ]);
    $result = $SnSclient->listTopics([
    ]);
    ddd($result);

    $attrib = $SnSclient->getSMSAttributes([
        'attributes' => ['DefaultSMSType'],
    ]);


        //$lists = $SnSclient->listSubscriptions([]);
        dd($result, $attrib, $lists);

//
//                $job = (new Send($message, $phone));
//                dispatch($job);
//
//                return "message sent!";
//
//         "metrics": [
//        [ "AWS/SNS", "SMSSuccessRate", "SMSType", "Transactional", "Country", "RO" ],
//        [ "...", "RU" ],
//        [ "...", "Promotional", ".", "." ]
    //]


    }
}
