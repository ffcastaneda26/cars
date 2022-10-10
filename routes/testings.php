<?php

use App\Http\Livewire\Picks;
use App\Models\Competidor;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {

    return 'Bienvenido a Pruebas';
});

Route::get('pronosticos/{competidor?}',Picks::class)->name('pronosticos');

Route::get('aciertos/{competidor}',function(Competidor $competidor){
    dd($competidor->Hits());
});

