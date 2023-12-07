<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HoroscopeController;

//garantit le maintien de la session
Route::middleware(['web'])->group(function () {
    Route::post('/connectUser', [HoroscopeController::class, 'connectUser'])->name('connectUser');
    Route::post('/', [HoroscopeController::class, 'deconnection'])->name('deconnection');
    Route::get('/delUser', [HoroscopeController::class, 'delUser'])->name('delUser');
    Route::get('/', [HoroscopeController::class, 'index'])->name('home');
    Route::post('/generate-horoscope', [HoroscopeController::class, 'generate'])->name('generate_horoscope');
    Route::get('/prediction', [HoroscopeController::class, 'showPrediction'])->name('prediction');
    Route::get('/user', [HoroscopeController::class, 'user'])->name('user');
    Route::post('/createUser', [HoroscopeController::class, 'createUser'])->name('createUser');
    Route::post('/connectUser', [HoroscopeController::class, 'connectUser'])->name('connectUser');
    Route::post('/updateUser', [HoroscopeController::class, 'updateUser'])->name('updateUser');
});