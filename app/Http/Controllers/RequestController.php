<?php

namespace App\Http\Controllers;

use App\Test;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use mysql_xdevapi\Exception;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\User;
use App\Ip;
use App\Pf;
use App\Activite;
use App\Adress;
class RequestController extends Controller
{

    public function send() {
        $params = $this->PrepareRequestFl();
        $res = $this->cardFL($params);
        return $res;
    }
    public function PrepareRequestFl() {
        $reader = IOFactory::load("222.xlsx");
        $worksheet = $reader->getActiveSheet();
        $peoples = $worksheet->toArray();
        unset($peoples[0]);
        $res = [];
        for($i = 0; $i<count($peoples); $i++) {
            $res[$i]['last_name'] = $peoples[$i + 1][0];
            $res[$i]['first_name'] = $peoples[$i + 1][1];
            $res[$i]['middle_name'] = $peoples[$i + 1][2];
            $res[$i]['inn'] = $peoples[$i + 1][3];
        }
        return $res;
    }
    public function findFL($params) {
        $kr = new KRController();
        foreach ($params as $param) {
            $fl = $kr->request($param,'find/person?inn=' . $param['inn'] . '&last_name=' . $param['last_name'] . '&first_name='. $param['first_name'] . '&middle_name=' . $param['middle_name']);
            if (!$fl) {
                throw new Exception('Пользователь не найден у поставщика', 400);
            }
            $user = User::where('person_id', $fl['person_id'])->first();
            if ($user){
                return $user->person_id;
            } else {
                User::create($fl);
                return User::latest()->first()->person_id;
            }
        }
    }
    public function cardFL($params){
        $person_id = $this->findFL($params);
        $kr = new KRController();
        sleep(1);
        $cf = $kr->request($params, 'person/' . $person_id, true);
        empty($cf['address']) ?: Adress::create($cf['address']);
        foreach ($cf['ip'] as $ip) {
            $ipM = new Ip();
            $ipM->fill($ip);
            $ipM->save();
            foreach ($ip['pf'] as $pf) {
                $pf['ip_id'] = $ipM->id;
                Pf::create($pf);
            }
            foreach ($ip['activities'] as $activity) {
                $activity['ip_id'] = $ipM->id;
                Activite::create($activity);
            }
        }
        return dd($cf);
    }
    public function exportExcel($card) {

    }

}
