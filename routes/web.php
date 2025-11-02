<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JocController;

Route::get('/', [JocController::class, 'index'])->name('home');

// CRUD web per a jocs (Blade views)
Route::resource('jocs', JocController::class);
