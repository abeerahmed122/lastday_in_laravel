<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
Route::get('/posts/create', [PostController::class, 'create'])->middleware('auth');

Route::get('/posts', [PostController::class, 'index'])->middleware('auth');
Route::get('/posts/{id}', [PostController::class, 'show'])->middleware('auth');
//Route::get('/posts/create', [PostController::class, 'create'])->middleware('auth');
Route::post('/posts', [PostController::class, 'store'])->middleware('auth');
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->middleware('auth');
Route::put('/posts/{id}', [PostController::class, 'update'])->middleware('auth');
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
