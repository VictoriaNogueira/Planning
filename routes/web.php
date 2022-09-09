<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AmountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;


Route::get('/', [AuthController::class,'home'])->name('home');
Route::get('/login', [AuthController::class,'index'])->name('login');
Route::post('/login', [AuthController::class,'validateLogin'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('register-user',[UserController::class, 'index'])->name('register-user');
Route::post('register-user',[UserController::class, 'store'])->name('register-user');

Route::post('/planning', [AmountController::class,'store']);
Route::get('/planning', [AmountController::class,'index'])->name('planning');
Route::delete('/planning/{id}', [AmountController::class,'destroy']);
Route::get('/planning/{id}', [AmountController::class,'destroy']);

Route::get('/dashboard', [AmountController::class,'cards'])->name('dashboard');





