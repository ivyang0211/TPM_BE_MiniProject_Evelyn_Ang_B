<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InsertDataController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/create', [InsertDataController::class, 'index']);
Route::post('/create', [InsertDataController::class, 'insertData'])->name('insertData');


