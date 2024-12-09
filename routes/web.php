<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InsertDataController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// DATABASE : 

// Create Data Route (Requires Authentication)
Route::middleware('auth')->get('/create', [InsertDataController::class, 'index']);
Route::middleware('auth')->post('/create', [InsertDataController::class, 'insertData'])->name('insertData');
Route::middleware('auth')->post('/run-seeder', [InsertDataController::class, 'runSeeder'])->name('runSeeder');

// Delete Data Route (Requires Authentication)
Route::middleware('auth')->delete('/delete/{id}', [HomeController::class, 'destroy'])->name('plane.destroy');

// Update Data Route (Requires Authentication)
Route::middleware('auth')->put('/update/{id}', [EditController::class, 'update'])->name('plane.update');

// Edit: Get Plane Details (Requires Authentication)
Route::middleware('auth')->get('/edit/{id}', [EditController::class, 'edit'])->name('plane.edit');





// AUTHENTICATION :
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);


