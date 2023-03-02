<?php

use App\Http\Controllers\Admin\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::put('/users/{user_id}/comments/{comment_id}', [CommentController::class, 'update'])->name('comments.update');
Route::get('/users/{id}/comments/create', [CommentController::class, 'create'])->name('comments.create');
Route::get('/users/{user_id}/comments/{comment_id}', [CommentController::class, 'edit'])->name('comments.edit');
Route::post('/users/{id}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/users/{id}/comments', [CommentController::class, 'index'])->name('comments.index');

Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users/create', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');