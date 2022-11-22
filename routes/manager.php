<?php

use App\Http\Livewire\Companies;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'manager'])->group(function () {
    Route::get('my-companies',Companies::class)->name('my-companies');                  // Empresas
});
