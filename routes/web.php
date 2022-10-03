<?php


use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\CustomerController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

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

Route::get('home',CustomerController::class)->name('home');