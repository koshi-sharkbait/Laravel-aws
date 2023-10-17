<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Aws\Sqs\SqsClient;

class WebApiController extends Controller
{
    //
    public function sendSqs()
    {
        $config = [
            'credentials' => [
                'key' => env('AWS_SECRET_ACCESS_KEY'),
                'secret' => env('AWS_ACCESS_KEY_ID'),
            ],
            'region' => 'ap-northeast-1', // ご利用のリージョン
            'version' => 'latest',
        ];
        //SQS Clientを作成
        $sqs = SqsClient::factory($config);

        // SQSのメッセージ
        $value = "piyo";

        // 送りたいSQSのURLを指定
        $sqs_url = env('AWS_SQS_URL');

        $params = [
            'DelaySeconds' => 0,
            'MessageBody' => $value,
            'QueueUrl' => $sqs_url,
        ];

        $result = $sqs->sendMessage($params);
        
    }
}
