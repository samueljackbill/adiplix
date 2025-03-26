<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/* Visão geral */
Route::get('/', [UserController::class, 'index'])->name('user.index');

/* Pessoas */
Route::get('/show-user/{user}', [UserController::class, 'show'])->name('user.show');
Route::get('/create-user', [UserController::class, 'create'])->name('user.create');
Route::post('/store-user', [UserController::class, 'store'])->name('user.store');
Route::get('/edit-user/{user}', [UserController::class, 'edit'])->name('user.edit');
Route::put('/update-user/{user}', [UserController::class, 'update'])->name('user.update');
/* Route::get('/destroy-user/{user}', [UserController::class, 'destroy'])->name('user.destroy'); */
Route::delete('/destroy-user/{user}', [UserController::class, 'destroy'])->name('user.destroy');

/* Tarefas */
Route::get('/task', [TaskController::class, 'index'])->name('task.index');