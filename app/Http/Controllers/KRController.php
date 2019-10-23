<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class KRController extends Controller
{
    const ACSESS_KEY = "demo";
    const URI = 'https://unicom24.ru/api/';

    public function post($params) {
        $client = new Client(['base_uri' => self::URI]);
        if (!$params || !is_array($params)) {
            throw new \Exception('Params has error', 400);
        }
       // $params = http_build_query($params);
        $one = microtime(1);
        try {
            $response = $client->post('partners/nbki/v2/request/sync_create/', [
                'form_params' => $params,
                'headers' => [
                    'Authorization' => self::ACSESS_KEY,
                    'Content-Type: application/x-www-form-urlencoded'
                ]
            ]);
        }
        catch (\Exception $exception) {
            dd($exception);
        }
        $two = microtime(1);
        $time = $two - $one;
        $result = json_decode((string)$response->getBody(), true);
        return ($result);
    }

}
