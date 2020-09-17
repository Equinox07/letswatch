<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\CheckSubscribe;
use Illuminate\Support\Facades\Http;

class CheckSubscriberContoller extends Controller
{



    public function subScribeUser()
    {
        $checkSub = new CheckSubscribe();

        $userData = [ "msisdn"=>"233240000000",
        "channel"=>"WIDGET",
        "auto_renew" => true];


        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json'
        ])->post('http://pro.jobsdotgo.com/api/v1/subscribe ', $userData);

        return \view('welcome', $checkSub);
    }


    public function checkSubscribe()
    {
        $checkSub = new CheckSubscribe();

        $sampData = ["msisdn" => "233242552198","carrier" =>"mtn"];


        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json'
        ])->post('http://pro.jobsdotgo.com/api/v1/check/subscribe-status', $sampData);


        return \view('welcome', $checkSub);
    }



    public function performRequest($method, $formParams = [], $headers = [])
    {
        $requestUrl = "http://pro.jobsdotgo.com/api/v1/check/subscribe-status";

        $client = new Client();
        $headers = ['Content-Type' => 'application/json;charset=UTF-8'];
        // $headers = ['Content-Type' => 'application/json'];
        $response = $client->request($method, $requestUrl, ['form_param' => $formParams, 'headers' => $headers]);



        return $response->getBody()->getContents();

    }
}
