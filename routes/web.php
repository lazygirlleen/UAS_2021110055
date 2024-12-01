<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ArtefactController;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\JokiController;
use App\Http\Controllers\JokiPaymentController;
use App\Http\Controllers\TopupController;
use App\Http\Controllers\TopupPaymentController;
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
Route::resource('artefacts', ArtefactController::class);
Route::resource('jokis', JokiController::class);
Route::get('topups/create', [TopupController::class, 'create'])->name('topups.create');
Route::get('jokis/payment/{joki}', [JokiController::class, 'payment'])->name('jokis.payment');
Route::post('jokis/store', [JokiController::class, 'store'])->name('jokis.store');

use App\Http\Controllers\PaymentController;

Route::post('payment/joki/confirm/{id}', [JokiController::class, 'confirmJokiPayment'])->name('payment.joki.confirm');
Route::post('payment/topup/confirm/{id}', [TopupController::class, 'confirmTopUpPayment'])->name('payment.topup.confirm');

