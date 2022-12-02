<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {

    return 'Bienvenido a Pruebas';
});

Route::get('update-passwords',function(){
    $users = User::all();
    foreach($users as $user){
        $user->password = Hash::make('password');
        $user->save();
    }
    return 'Listo carnal';
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
                echo  $vehicle->value;
            echo '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
});
