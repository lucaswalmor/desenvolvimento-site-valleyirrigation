<?php

namespace App\Http\Controllers\api;

use App\Classes\Sistema\OrderData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Classes\Sistema\Revendas;
use DateTime;
use DateTimeZone;

class api_teste extends Controller
{

    private $key = '767c616eb4111914324cde11d692a7cc';
    private $iv = 'f40cad0f4f43886e';
    private $user_name = 'VALLEY';
    private $time_ok = 60;

    public function index()
    {

    }
    
    public function store(Request $request)
    {
        $data = $request->all();
        $token = $data['token'];
        $content_json = $data['data_json'];
        
		// Decode the JSON object
		$data_json = json_decode($content_json, true);
		$order_number = $data_json['data'][0]['ID'];

        $decrypt_token_client = $this->decrypt_token($token, $this->key, $this->iv);       

        $today = $this->ts2time(time(), 'America/Sao_Paulo');
        
        $date_client = $this->ts2time($decrypt_token_client[2], 'America/Sao_Paulo');

        if ($this->calculates_minutes($today, $date_client) <= $this->time_ok) {

            if ($decrypt_token_client[0] == $this->user_name && $decrypt_token_client[1] == $order_number) {
                $msg = "Sucessfull!!";
                $ret = 200;

                // GRAVAR NO BANCO DE DADOS AQUI NESTA LINHA
                if (OrderData::where('order_number', '=', $order_number)->exists()) {
                    $msg = "Order number invalid!!";
                    $ret = 400;                    
                } else {
                    OrderData::create([
                        'data_json' => $content_json,
                        'order_number' => $order_number
                    ]);
                }
            } else {
                $msg = " User name or code invalid!!";
                $ret = 400;
            }
        } else {
            $msg = " Token Expired!!";
            $ret = 400;
        }

        return response()->json(['mensagem' => $msg] , $ret); 
    }

    public function show($id)
    {
        return Revendas::findOrFail($id);
    }
    
    public function update(Request $request, $id)
    {
        $revenda = Revendas::findOrFail($id);
        $revenda->update($request->all());
    }
    
    public function destroy($id)
    {
        $revenda = Revendas::findOrFail($id);
        $revenda->delete();
    }

    public function generate_token($username, $code, $ky, $iv) {
        $utc = time();
        $text = $username . "," . $code . "," . $utc;
        $etext = encryptRJ256($ky, $iv, $text);
    
        $strippedetext = str_replace("+", "-", $etext);
        $strippedetext = str_replace("/", "_", $strippedetext);
        $strippedetext = str_replace("=", "%3D", $strippedetext);
    
        return $strippedetext;
    }
    
    public function decrypt_token($token, $ky, $iv) {
    
        $token = str_replace("-", "+", $token);
        $token = str_replace("_", "/", $token);
        $token = str_replace("%3D", "=", $token);
    
        $dtext = $this->decryptRJ256($ky, $iv, $token);
    
        return explode(",", $dtext);
    }
    
    public function decryptRJ256($key, $iv, $string_to_decrypt) {
        $string_to_decrypt = base64_decode($string_to_decrypt);
        $rtn = openssl_decrypt($string_to_decrypt, "AES-256-CBC", $key, OPENSSL_RAW_DATA, $iv);
        $rtn = rtrim($rtn, "\0\4");
        return($rtn);
    }
    
    public function encryptRJ256($key, $iv, $string_to_encrypt) {
        $rtn = openssl_encrypt($string_to_encrypt, "AES-256-CBC", $key, OPENSSL_RAW_DATA, $iv);
        $rtn = base64_encode($rtn);
        return($rtn);
    }

    public function ts2time($timestamp,$timezone){ 
        $date = new DateTime(date("d F Y H:i:s",$timestamp));
        $date->setTimezone(new DateTimeZone($timezone));
        $rtn = $date->format('Y-m-d H:i:s'); 
        return $rtn;
    }

    public function calculates_minutes($start_time, $end_time) {
        $minutes = 0;

        $dateStart = new \DateTime($start_time);
        $dateNow = new \DateTime($end_time);
        $dateDiff = $dateStart->diff($dateNow);
    
        $minutes = $dateDiff->i + (($dateDiff->h + ($dateDiff->days * 24)) * 60);
        if ($minutes == 0) {
        $minutes++; // if difference is a few seconds
        }
        return $minutes;
    }
}
