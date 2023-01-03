<?php

use App\Http\Livewire\Colors;
use App\Http\Livewire\Roles;
use App\Http\Livewire\Dealers;
use App\Http\Livewire\Makes;
use App\Http\Livewire\Materials;
use App\Http\Livewire\Packages;
use App\Http\Livewire\Permissions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\RolePermissions;
use App\Http\Livewire\SocialNetworks;
use App\Http\Livewire\Tags;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;


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
    Route::get('colors',Colors::class)->name('colors');                                 // Colores
    Route::get('materials',Materials::class)->name('materials');                        // Material Interior

    Route::get('social-networks',SocialNetworks::class)->name('social-networks');       // Redes Sociales
    Route::get('packages',Packages::class)->name('packages');                           // Paquetes
    Route::get('tags',Tags::class)->name('tags');                                       // Etiquetas

    Route::get('dealers',Dealers::class)->name('dealers');                              // Distribuidores


});
