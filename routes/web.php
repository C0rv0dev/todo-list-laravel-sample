<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Auth::routes();

// get, post, put, delete, patch 
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'todo'], function () {
    Route::get('/create', [TodoController::class, 'create'])->name('todo.create');
    Route::get('/edit/{todo}', [TodoController::class, 'edit'])->name('todo.edit');
    Route::post('/store', [TodoController::class, 'store'])->name('todo.store');
    Route::patch('/update/{todo}', [TodoController::class, 'update'])->name('todo.update');
    Route::delete('/destroy/{id}', [TodoController::class, 'destroy'])->name('todo.destroy');
});
