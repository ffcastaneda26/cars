<?php

use App\Http\Livewire\Picks;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {

    return 'Bienvenido a Pruebas';
});

Route::get('pronosticos',Picks::class)->name('pronosticos');

