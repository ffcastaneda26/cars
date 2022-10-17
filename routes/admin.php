<?php

use App\Http\Livewire\Games;
use App\Http\Livewire\Roles;
use App\Http\Livewire\Users;
use App\Http\Livewire\Permissions;
use App\Http\Livewire\Rounds;
use App\Http\Livewire\Sports;
use App\Http\Livewire\Teams;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;


Route::get('storage-link',function(){

    if(Auth::user()->isAdmin()){
        if(file_exists(public_path('storage'))){
            return public_path('storage') . 'Ya existe...';
        }
        Artisan::call('storage:link');
        return 'Has creado tu enlace Simbolico';
    }else{
        return 'Sorry You Not Authorized To This Command';
    }
})->middleware(['auth','admin']);

Route::get('optimize',function(){
    Artisan::call('optimize');
    return 'Se ha inicializado todo';
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('users',Users::class)->name('users');                            // Usuarios
    Route::get('permission',Permissions::class)->name('permission');            // Permisos
    Route::get('role',Roles::class)->name('role');                              // Roles
    Route::get('sports',Sports::class)->name('sports');                         // Deportes;
    Route::get('teams',Teams::class)->name('teams');                            // Equipos;
    Route::get('rounds',Rounds::class)->name('rounds');                         // Jornadas (rondas)
    Route::get('games',Games::class)->name('games');                            // Juegos (games)
});
