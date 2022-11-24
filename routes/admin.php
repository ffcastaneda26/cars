<?php

use App\Http\Livewire\Roles;
use App\Http\Livewire\Genders;
use App\Http\Livewire\Statuses;

use App\Http\Livewire\Companies;
use App\Http\Livewire\Industries;
use App\Http\Livewire\Languages;
use App\Http\Livewire\Nationalities;
use App\Http\Livewire\Permissions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\RolePermissions;
use App\Http\Livewire\SalaryTypes;
use App\Http\Livewire\TimeTypes;
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
    Route::get('permission',Permissions::class)->name('permission');                    // Permisos
    Route::get('role',Roles::class)->name('role');                                      // Roles
    Route::get('role-permission',RolePermissions::class)->name('role-permission');      // Asigar Permisos al Rol
    Route::get('statuses', Statuses::class)->name('statuses');                          // Estados de registros
    Route::get('genders', Genders::class)->name('genders');                             // Géneros
    Route::get('companies',Companies::class)->name('companies');                        // Empresas
    Route::get('nationalities',Nationalities::class)->name('nationalities');            // Nacionalidades
    Route::get('salary-types',SalaryTypes::class)->name('salary-types');                // Tipos de Salario
    Route::get('time-types',TimeTypes::class)->name('time-types');                      // Tipos de Tiempo
    Route::get('languages',Languages::class)->name('languages');                        // Idiomas
    Route::get('industries',Industries::class)->name('industries');                     // Industrias



});
