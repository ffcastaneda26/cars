<?php

use App\Http\Livewire\Picks;
use App\Models\Competidor;
use App\Models\Round;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {

    return 'Bienvenido a Pruebas';
});

Route::get('jornada',function(){


    $round =Round::ActiveRound()->get();
    dd('Ahora=' . now(),$round);

});


