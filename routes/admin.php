<?php

use App\Http\Livewire\Gifts;
use App\Http\Livewire\Roles;
use App\Http\Livewire\Users;
use App\Http\Livewire\Genders;
use App\Http\Livewire\Options;
use App\Http\Livewire\Statuses;
use App\Http\Livewire\Customers;
use App\Http\Livewire\Languages;
use App\Http\Livewire\Questions;
use App\Http\Livewire\EdgeRanges;
use App\Http\Livewire\Promotions;
use App\Http\Livewire\Ethnicities;
use App\Http\Livewire\Permissions;
use App\Http\Livewire\TypesQuestion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Livewire\CustomerController;
use App\Http\Livewire\PromotionQuestions;

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

});
