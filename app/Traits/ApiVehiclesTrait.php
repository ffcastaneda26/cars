<?php


/*+-------------------------------------------------------------------------------------------------+
  | API PARA CONSULTAR VEHICULOS CON EL VINNUMBER                                                   |
  +-------------------------------------------------------------------------------------------------|
  | Fecha       | Author  |   Descripción                                                           |
  +-------------+---------+-------------------------------------------------------------------------+
  | 26-ago-22   | FCO     | Creación                                                                |
  | 07-Oct-22   | MANN    | Modificacion de Guardado de Archivos metodo StoreAs agregando 'public'  |
  +-------------+---------+-------------------------------------------------------------------------+
 */
namespace App\Traits;




trait ApiVehiclesTrait {





    public function searchApiVin($vin_number){
        if(!$vin_number || strlen($vin_number) != 17){
            return false;
        }

        $apiPrefix = "https://api.vindecoder.eu/3.2";
        $apikey = "634b95d2dcb2";   // Your API key
        $secretkey = "1536419f16";  // Your secret key
        $id = "decode";
        $vin = mb_strtoupper($vin_number);
        $controlsum = substr(sha1("{$vin}|{$id}|{$apikey}|{$secretkey}"), 0, 10);
        $data = file_get_contents("{$apiPrefix}/{$apikey}/{$controlsum}/decode/{$vin}.json", false);
        $result = json_decode($data);
        $json_string = json_encode($result);
        $file = 'vin_number_' . $vin_number . '.json';
        
        file_put_contents($file, $json_string);
    }




    public $api_end_point;



}
