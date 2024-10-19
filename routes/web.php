<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

// get, post, put, delete, patch 
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/todos', [App\Http\Controllers\TodoController::class, 'index']);
