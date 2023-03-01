<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Model;

Route::get('/', function () {

    return 'Bienvenido a Pruebas';
});


Route::get('update-password/{user}/{password}',function(User $user,$password){
    $user->password = Hash::make('password');
    return 'Clave actualizada al usuario ' . $user->name;
});

Route::get('update-passwords',function(){
    $users = User::all();
    foreach($users as $user){
        $user->password = Hash::make('password');
        $user->save();
    }
    return 'Listo todos los usuarios tienen la clave < password >';
});


Route::get('consulta/{tabla}/{atributo}',function($tabla,$atributo){

    $records = DB::table($tabla)->select($atributo, DB::raw( 'count(*) as total'))
        ->groupBy($atributo)
        ->groupBy($atributo)
        ->get();

    dd($records);

});

