<?php

use App\Http\Livewire\Locations;
use App\Http\Livewire\Users;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'manager'])->group(function () {
    Route::get('my-users',Users::class)->name('my-users');                      // Usuarios
    Route::get('my-locations',Locations::class)->name('my-locations');          // Sucursales
});
