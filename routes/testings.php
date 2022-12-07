<?php

use App\Models\ApiTagsAttribute;
use App\Models\Dealer;
use App\Models\Location;
use App\Models\MissingTag;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {

    return 'Bienvenido a Pruebas';
});


Route::get('sucursales',function(){
    $records = Auth::user()->locations()->Name($search)->get();
    foreach($records as $record){
        echo $record->name . '<br>';
    }
})->name('sucursales');

Route::get('update-passwords',function(){
    $users = User::all();
    foreach($users as $user){
        $user->password = Hash::make('password');
        $user->save();
    }
    return 'Listo todos los usuarios tienen la clave < password >';
});

Route::get('genera-vin/{vin_number?}',function($vin_number=null){
    if(!$vin_number){
        return 'Lo siento, debe introducir un número de VIN';
    }

    if(strlen($vin_number) != 17){
        return 'Lo siento, número VIN debe tener 17 carácteres';
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

    echo '<table><thead>';
    echo '<th> DATO</th><th>VALOR</th></thead>';
    echo '<tbody>';
    foreach ($result->decode as $vehicle) {
        echo '<tr>';
            echo '<td>';
                echo $vehicle->label;
            echo '</td>';
            echo '<td>';
                if($vehicle->label == 'Wheel Rims Size Array' ||
                   $vehicle->label == 'Wheel Size Array' ||
                   $vehicle->label ==  'Wheelbase Array (mm)' ){
                    echo 'array';
                }else{
                    echo  $vehicle->value;
                }
            echo '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';


});

Route::get('consulta-vin/{vin_number?}',function($vin_number=null){
    if(!$vin_number){
        return 'Lo siento, debe introducir un número de VIN';
    }

    if(strlen($vin_number) != 17){
        return 'Lo siento, número VIN debe tener 17 carácteres';
    }
    $file = 'vin_number_' . $vin_number . '.json';
    $datos_vehicle = file_get_contents($file);

    $json_vehicle = json_decode($datos_vehicle, false);
    echo '<table><thead>';
    echo '<th> DATO</th><th>VALOR</th></thead>';
    echo '<tbody>';
    foreach ($json_vehicle->decode as $vehicle) {
        echo '<tr>';
            echo '<td>';
                echo $vehicle->label;
            echo '</td>';
            echo '<td>';
                if( $vehicle->label == 'Wheel Rims Size Array' ||
                    $vehicle->label == 'Wheel Size Array' ||
                    $vehicle->label ==  'Wheelbase Array (mm)' ){
                    foreach($vehicle->value as $arr_value){
                        // echo $arr_value;

                    }

                }else{
                    echo  $vehicle->value;
                }
            echo '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
});


Route::get('grabar-vin/{vin_number?}',function($vin_number=null){
    if(!$vin_number){
        return 'Lo siento, debe introducir un número de VIN';
    }

    if(strlen($vin_number) != 17){
        return 'Lo siento, número VIN debe tener 17 carácteres';
    }

    $file = 'vin_number_' . $vin_number . '.json';

    if(!file_exists($file)) {
        return 'El archivo '.$file.' '. ' No Existe';
    }


    $datos_vehicle = file_get_contents($file);
    $json_vehicle = json_decode($datos_vehicle, false);
    $record_vehicle = new Vehicle();
    $record_vehicle->location_id= Location::all()->random()->id;

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
                // foreach($vehicle->value as $value_array){
                //     $record_vehicle->$attribute_table=$value_array;
                // }
            continue;
        }else{
            $record_vehicle->$attribute_table=$vehicle->value;
        }

    }
    // dd($record_vehicle);
    
    $record_vehicle->save();

    // Borramos el archivo
        echo  'Se grabó el vehículo sin problemas... ' . '<br>';

        // If (unlink($file)) {
        //     return  'Archivo:' . $file . ' Fue eliminado....' ;
        // } else {
        //    return 'ATENCION Hubo problemas al intentar eliminar el archivo:' . $file ;

        // }


});

Route::get('asignar-dealers/{user}/{dealer}',function(User $user,Dealer $dealer){
    $user->dealers()->detach($dealer);
    $user->locations()->attach($dealer->locations);
    
});