<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\TopupController;
use App\Http\Controllers\WeaponController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('characters', CharacterController::class);
Route::resource('weapons', WeaponController::class);
Route::resource('topups', TopupController::class);
Route::resource('accounts', AccountController::class);


