<?php

use App\Http\Livewire\FindMyCars;
use App\Http\Livewire\Users;


use App\Http\Livewire\MainSearch;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\VehicleDetails;
use Illuminate\Support\Facades\Route;


// Registrar solicitudes
Route::get('findmycar',FindMyCars::class)->name('findmycar'); // Solicitudes de usuarios

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {

        if(!Auth::user()->roles()->count()){
            return redirect('/vehicle-search');
        }
        return view('dashboard');
    })->name('dashboard');

});

Route::middleware(['auth'])->group(function () {
    /*  Route::get('role-permission',RolePermissions::class)->name('role-permission'); */
     Route::get('users',Users::class)->name('users'); // Usuarios
 });

Route::get('/{style?}',MainSearch::class)->name('vehicle-search');



/* Cambio de Lenguaje */
Route::get('language/{locale}', function ($locale) {
    if (! in_array($locale, ['en', 'es'])) {
        abort(404);
    }
    session()->put('locale', $locale);
    App::setLocale(session()->get('locale'));
    return back();
})->name('changelanguage');

/* Logout alternativo para bootstrap */
Route::group(['namespace' => 'App\Http\Controllers'], function() {
    Route::group(['middleware' => ['auth']], function() {
        Route::get('/logout', function(){
            \Session::flush();
            Auth::logout();
            return redirect('/');
        })->name('logout.perform');
    });
});


// Route::get('vehicle-search',MainSearch::class)->name('vehicle-search');

Route::get('vehicle-details/{vehicle}',VehicleDetails::class)->name('vehicle-details');

