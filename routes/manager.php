<?php

use App\Http\Livewire\DealerTags;
use App\Http\Livewire\Locations;
use App\Http\Livewire\Vehicles;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'manager'])->group(function () {
    Route::get('my-locations',Locations::class)->name('my-locations');      // Sucursales
    Route::get('my-vehicles',Vehicles::class)->name('my-vehicles');         // Vehículos
    Route::get('my-tags',DealerTags::class)->name('my-tags');               // Etiquetas
});
