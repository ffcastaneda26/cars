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

use App\Models\ApiTagsAttribute;
use App\Models\MissingTag;
use App\Models\TemporaryInventory;
use App\Models\TemporaryVehicle;

trait ApiVehiclesTrait {

    private $apiPrefix = "https://api.vindecoder.eu/3.2";
    private $apikey = "634b95d2dcb2";   // Your API key
    private $secretkey = "1536419f16";  // Your secret key
    private $process = "decode";


    public function searchApiVin($vin_number,$location_id){
        
        $file=$this->createApiFileVin($vin_number,$location_id);
        if($file){
            return $this->store_temporary_vehicle($file,$location_id);
        }
        return false;
 
    }


    // Crea archivo con la API VIN
    public function createApiFileVin($vin_number){
        if(!$vin_number || strlen($vin_number) != 17){
            return false;
        } 

        $vin_number = mb_strtoupper($vin_number);
        $controlsum = substr(sha1("{$vin_number}|{$this->process}|{$this->apikey}|{$this->secretkey}"), 0, 10);
        $data = file_get_contents("{$this->apiPrefix}/{$this->apikey}/{$controlsum}/decode/{$vin_number}.json", false);
        $result = json_decode($data);
        $json_string = json_encode($result);
        $file = 'vin_number_' . $vin_number . '.json';
        file_put_contents($file, $json_string);
        return $file;
    }

    // Graba vehículo en temporales
    private function store_temporary_vehicle($file,$location_id){
        $datos_vehicle = file_get_contents($file);
        $json_vehicle = json_decode($datos_vehicle, false);
       
        $record_vehicle = new TemporaryVehicle();
    
        foreach ($json_vehicle->decode as $vehicle) {
           
            $search_tag = strtolower($vehicle->label);
            $api_tag_attributte_record = ApiTagsAttribute::Tag($search_tag)->first();
    
            if(!$api_tag_attributte_record){
                $is_array = strpos($vehicle->label,'rray',1);
                if ($is_array) {
                    $value_tag = 'Es Array';
                }else{
                    $value_tag = $vehicle->value;
                }
    
                MissingTag::create([
                    'api_tag'   => $vehicle->label,
                    'value_tag' => $value_tag
                ]);
                continue;
            }
    
            $attribute_table=$api_tag_attributte_record->table_attribute;
    
            if( $vehicle->label == 'Wheel Rims Size Array' ||
                $vehicle->label == 'Wheel Size Array' ||
                $vehicle->label ==  'Wheelbase Array (mm)' ){
                 continue;
            }else{
                $record_vehicle->$attribute_table=$vehicle->value;
            }

        }

        $record_vehicle->location_id=$location_id;

        $record_vehicle->save();
        unlink($file);

        return $record_vehicle;
    
    }


    public function store_missing_label($vehicle){
        $is_array = strpos($vehicle->label,'rray',1);
        if ($is_array) {
            $value_tag = 'Es Array';
        }else{
            $value_tag = $vehicle->value;
        }
            MissingTag::create([
            'api_tag'   => $vehicle->label,
            'value_tag' => $value_tag
        ]);
    }


}
