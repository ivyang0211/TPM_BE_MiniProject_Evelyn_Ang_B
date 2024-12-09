<?php

use App\Http\Controllers\EditController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InsertDataController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Create Data Route
Route::get('/create', [InsertDataController::class, 'index']);
Route::post('/create', [InsertDataController::class, 'insertData'])->name('insertData');

// Delete Data Route
Route::delete('/delete/{id}', [HomeController::class, 'destroy'])->name('plane.destroy');

// Update Data Route
Route::put('/update/{id}', [EditController::class, 'update'])->name('plane.update');

// Edit: Get Plane Details
Route::get('/edit/{id}', [EditController::class, 'edit'])->name('plane.edit');


