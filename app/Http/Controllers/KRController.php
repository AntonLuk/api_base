<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Validation\UnauthorizedException;

class KRController extends Controller
{
    const URI = 'https://service.deltasecurity.ru/api/';

    public function request($params, $uri, $find = false) {
        $client = new Client(['base_uri' => self::URI]);
        if (!$params || !is_array($params)) {
            throw new \Exception('Params has error', 400);
        }
        $auth = [
            'login' => env('LOGIN'),
            'password' => env('PASSWORD_MD5')
        ];
        $one = microtime(1);
        try {
            $response = $client->post($uri, [
                'form_params' => $auth,
                'headers' => [
                    'Content-Type: application/x-www-form-urlencoded'
                ]
            ]);
        }
        catch (\Exception $exception) {
            dd($exception);
        }
        $two = microtime(1);
        $time = $two - $one;
        //$result = json_decode((string)$response->getBody(), 1);
        if($find) {
            $result = json_decode((string)$response->getBody(), 1);
            $result = (array)$result;
        } else {
            $result = json_decode((string)$response->getBody());
            $result = (array)$result[0];
        }
        return $result;


    }

}
