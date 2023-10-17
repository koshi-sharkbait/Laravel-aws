<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Aws\Sqs\SqsClient;

class WebApiController extends Controller
{
    //
    public function sendSqs()
    {
        // laravelで設定している認証情報でクライアントを作成
        $sqs = app()->make('aws')->createClient('sqs');

        // SQSのメッセージに渡したい文字列を用意する
        $value = "hoge/huga/hugo";

        // 送りたいSQSのURLを指定（laravelのconfigにて.envを参照しています)
        // $queueUrl = config('aws.sqs.url
        $queueUrl = "https://sqs.ap-northeast-1.amazonaws.com/795600592301/laravelTest-sqs";

        // SDKのAPIで渡すためのパラメータを用意
        $params = [
            'DelaySeconds' => 0,
            'MessageBody' => $value,
            'QueueUrl' => $queueUrl,
        ];

        $sqs->sendMessage($params);
        
        return view('welcome');
        
    }
}
