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
