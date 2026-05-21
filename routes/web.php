<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchoolClassController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\RegisterController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::get('/class', [SchoolClassController::class, 'index'])->name('class.index');

Route::post('/class', [SchoolClassController::class, 'store'])->name('class.store');

//register route
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');

Route::post('/register', [RegisterController::class, 'store'])->name('student.store');


//student route
Route::get('/portal', [StudentController::class, 'StudentPortal'])->name('portal');

//attendance update route
Route::put('/attendance/{id}', [RegisterController::class, 'update'])->name('attendance.update');

//attendance delete route
Route::delete('/attendance/{id}', [RegisterController::class, 'destroy'])->name('attendance.delete');