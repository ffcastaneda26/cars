<?php

use App\Http\Livewire\Companies;
use App\Http\Livewire\competidors;
use App\Http\Livewire\Roles;
use App\Http\Livewire\Users;
use App\Http\Livewire\Statuses;
use App\Http\Livewire\Permissions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Livewire\Games;
use App\Http\Livewire\Rounds;
use App\Http\Livewire\Teams;

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
    return 'Ya limpiaste todo';
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('users',Users::class)->name('users');                            // Usuarios
    Route::get('permission',Permissions::class)->name('permission');            // Permisos
    Route::get('role',Roles::class)->name('role');                              // Roles
    Route::get('statuses', Statuses::class)->name('statuses');                  // Estados de registros
    Route::get('companies',Companies::class)->name('companies');                // Empresas
    Route::get('teams',Teams::class)->name('teams');                            // Equipos
    Route::get('rounds',Rounds::class)->name('rounds');                         // Rondas (Jornadas)
    Route::get('games',Games::class)->name('games');                            // Juegos (Partidos)
    Route::get('competidors',competidors::class)->name('competidors');          // Competidores (Participantes)


});
