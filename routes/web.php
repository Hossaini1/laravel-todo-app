<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

// Todo Routes
Route::get('/todos',[TodoController::class,'index'])->name('todo.index');
Route::get('/todos/create',[TodoController::class,'create'])->name('todo.create');
Route::post('/todos',[TodoController::class,'store'])->name('todo.store');

// Category Routes
Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
Route::get('/categories/create', [CategoryController::class , 'create'])->name('category.create');
Route::post('/categories', [CategoryController::class , 'store'])->name('category.store');
Route::get('/categories/{category}/edit', [CategoryController::class , 'edit'])->name('category.edit');
Route::put('/categories/{category}/update', [CategoryController::class , 'update'])->name('category.update');
Route::delete('/categories/{category}/delete',[CategoryController::class,'destroy'])->name('category.destroy');

