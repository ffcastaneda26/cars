<?php

use App\Http\Livewire\Colors;
use App\Http\Livewire\Roles;
use App\Http\Livewire\Genders;
use App\Http\Livewire\Statuses;

use App\Http\Livewire\Companies;
use App\Http\Livewire\DriveTrains;
use App\Http\Livewire\Fuels;
use App\Http\Livewire\Grades;
use App\Http\Livewire\Industries;
use App\Http\Livewire\JobTypes;
use App\Http\Livewire\Languages;
use App\Http\Livewire\Makes;
use App\Http\Livewire\Nationalities;
use App\Http\Livewire\Permissions;
use App\Http\Livewire\Positions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\RolePermissions;
use App\Http\Livewire\SalaryTypes;
use App\Http\Livewire\SocialNetworks;
use App\Http\Livewire\Styles;
use App\Http\Livewire\TimeHires;
use App\Http\Livewire\TimeTypes;
use App\Http\Livewire\Trims;
use App\Models\TimesHire;
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


    Route::get('colors',Colors::class)->name('colors');                             // Colores
    Route::get('drivetrains',DriveTrains::class)->name('drivetrains');              // Transmisiones
    Route::get('fuels',Fuels::class)->name('fuels');                                // Combustibles
    Route::get('makes',Makes::class)->name('makes');                                // Marcas (Fabricantes)
    Route::get('styles',Styles::class)->name('styles');                             // Estilos
    Route::get('trims',Trims::class)->name('trims');                                 // Adronos (accesorios)

    Route::get('social-networks',SocialNetworks::class)->name('social-networks');  // Redes Sociales

});
