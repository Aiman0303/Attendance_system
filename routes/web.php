<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchoolClassController;
use App\Http\Controllers\LoginController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::get('/class', [SchoolClassController::class, 'index']);
Route::post('/class', [SchoolClassController::class, 'store']);

