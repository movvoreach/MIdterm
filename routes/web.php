<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpendsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IncomController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/expends', [ExpendsController::class, 'index'])->name('expends.index');
Route::get('/expends/create', [ExpendsController::class, 'create'])->name('expends.create');
Route::post('/expends', [ExpendsController::class, 'store'])->name('expends.store');
Route::get('/expends/{id}/edit', [ExpendsController::class, 'edit'])->name('expends.edit');
Route::put('/expends/{id}', [ExpendsController::class, 'update'])->name('expends.update');
Route::delete('/expends/{id}', [ExpendsController::class, 'destroy'])->name('expends.destroy');

//income routes
Route::get('/income', [IncomController::class, 'index'])->name('income.index');
Route::get('/income/create', [IncomController::class, 'create'])->name('income.create');
Route::post('/income', [IncomController::class, 'store'])->name('incomes.store');
Route::get('/income/{id}/edit', [IncomController::class, 'edit'])->name('income.edit');
Route::put('/income/{id}', [IncomController::class, 'update'])->name('income.update');
Route::delete('/income/{id}', [IncomController::class, 'destroy'])->name('income.destroy');

// Category routes
Route::get('/category/create', [CategoryController::class, 'create'])->name('categories.create');
Route::get('/category', [CategoryController::class, 'index'])->name('categories.index');
Route::post('/category', [CategoryController::class, 'store'])->name('categories.store');
Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
Route::put('/category/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');