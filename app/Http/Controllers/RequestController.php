<?php

namespace App\Http\Controllers;

use App\Test;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
class RequestController extends Controller
{
    public function send() {

        $post_data_array = array(    'first_name' => 'Иван',    'second_name'=> 'Иванов',    'passport' => '0000000002',    'payment_type' => 'COMPANY_WALLET'    );

        $client = new KRController();
        $res = $client->post($post_data_array);
        return dd($res);
//        $keys = [];
//        $reader = IOFactory::load("222.xlsx");
//        $worksheet = $reader->getActiveSheet();
//        $peoples = $worksheet->toArray();
//        //unset($peopsles[0]);
//        return dd($peoples);
//
//        foreach ($worksheet->getRowIterator() as $row) {
//            $cellIterator = $row->getCellIterator();
//            $cellIterator->setIterateOnlyExistingCells(FALSE);
//            foreach ($cellIterator as $cell) {
//                   return dd($cell->getValue());
//            }
//            return dd($cellIterator);
//        }
//       return dd($reader->getActiveSheet()->getCellCollection());
//        $token = $this->auth();
//        $URI = 'https://developers.etagi.com';
//        $client = new Client(['base_uri' => $URI]);
//        $one = microtime(1);
//        $response = $client->get('/api/v1/objects/list?api_key=demo', [
//            'headers' => [
//                'Content-Type' =>  'application/json'
//            ],
//            'Authorization' => [
//                'Bearer' => $token
//            ]
//        ]);
//        $two = microtime(1);
//        $time = $two - $one;
//        $res = json_decode((string)$response->getBody(), true);
//        return dd($res);
    }

    public function auth (){
        $client = new Client(); //GuzzleHttp\Client
        $response = $client->get('https://developers.etagi.com/api/v1/users/auth?api_key=demo', [
            'auth' => [
                'a.v.lukyanov',
                'siPH6Yy7G4'
            ]
        ]);
        $json = json_decode((string)$response->getBody(), true);
        $token = $json['data']['token'] ;
        return $token;
    }
}
