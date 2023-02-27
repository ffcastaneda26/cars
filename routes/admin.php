<?php

use App\Models\User;
use App\Http\Livewire\Makes;
use App\Http\Livewire\Roles;
use App\Http\Livewire\Models;
use App\Http\Livewire\Styles;
use App\Http\Livewire\Dealers;
use App\Http\Livewire\Vehicles;
use App\Http\Livewire\Permissions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\RolePermissions;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\VehiclesController;


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
    Route::get('permissions',Permissions::class)->name('permissions');                  // Permisos
    Route::get('roles',Roles::class)->name('roles');                                    // Roles
    Route::get('role-permission',RolePermissions::class)->name('role-permission');      // Asigar Permisos al Rol
    Route::get('makes',Makes::class)->name('makes');                                    // Marcas
    Route::get('models',Models::class)->name('models');                                 // Modelos
    Route::get('styles',Styles::class)->name('styles');                                 // Estilos

    Route::get('dealers',Dealers::class)->name('dealers');                              // Distribuidores
    Route::get('vehicles',Vehicles::class)->name('vehicles');
    Route::get('vehicles/photos/{vehicle}',[VehiclesController::class,'vehicle_photos'])->name('vehicles-photos'); // Subir Fotos

});
