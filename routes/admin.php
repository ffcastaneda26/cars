<?php

use App\Http\Livewire\Ethnicities;
use App\Http\Livewire\Gifts;
use App\Http\Livewire\Roles;
use App\Http\Livewire\Users;
use App\Http\Livewire\Statuses;
use App\Http\Livewire\Languages;
use App\Http\Livewire\Options;
use App\Http\Livewire\Permissions;
use App\Http\Livewire\Promotions;
use App\Http\Livewire\Questions;
use App\Http\Livewire\TypesQuestion;
use App\Models\Ethnicity;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

Route::get('storage-link',function(){
    if(Auth::user()->isAdmin()){
        if(file_exists(public_path('storage'))){
            return public_path('storage') . 'Ya esiste';
        }
        Artisan::call('storage:link');
    }else{
        return 'Sorry You Not Authorized To This Command';
    }
})->middleware(['auth','admin']);


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('users',Users::class)->name('users');                            // Usuarios
    Route::get('permission',Permissions::class)->name('permission');            // Permisos
    Route::get('role',Roles::class)->name('role');                              // Roles
    Route::get('statuses', Statuses::class)->name('statuses');                  // Estados de registros
    Route::get('languages', Languages::class)->name('languages');               // Idiomas
    Route::get('promotions',Promotions::class)->name('promotions');             // Promociones
    Route::get('gifts',Gifts::class)->name('gifts');                            // Regalos
    Route::get('types-question',TypesQuestion::class)->name('types-question');  // Tipos de Pregunta
    Route::get('questions',Questions::class)->name('questions');                // Preguntas
    Route::get('options',Options::class)->name('options');                      // Opciones
    Route::get('ethnicities',Ethnicities::class)->name('ethnicites');           // Etnias

});

