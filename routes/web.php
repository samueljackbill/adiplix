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
Route::post('/store-task', [TaskController::class, 'store'])->name('task.store');
Route::get('/create-task', [TaskController::class, 'create'])->name('task.create');
Route::get('/show-task/{task}', [TaskController::class, 'show'])->name('task.show');
Route::get('/edit-task/{task}', [TaskController::class, 'edit'])->name('task.edit');
Route::put('/update-task/{task}', [TaskController::class, 'update'])->name('task.update');
/* Route::get('/destroy-task/{task}', [TaskController::class, 'destroy'])->name('task.destroy'); */
Route::delete('/destroy-task/{task}', [TaskController::class, 'destroy'])->name('task.destroy');