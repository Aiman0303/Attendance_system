<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchoolClassController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::get('/class', [SchoolClassController::class, 'index'])->name('class.index');

Route::post('/class', [SchoolClassController::class, 'store'])->name('class.store');

//student route
Route::get('/student', [StudentController::class, 'StudentPortal'])->name('portal');
