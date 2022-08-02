<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AmountController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/planning', [AmountController::class,'store']);
Route::get('/planning', [AmountController::class,'index']);
Route::delete('/planning/{id}', [AmountController::class,'destroy']);
Route::get('/planning/{id}', [AmountController::class,'destroy']);



// Route::get('/planning', [AmountController::class,'index']);
// Route::post('/planning', [AmountController::class,'index']);
// Route::get('/planning/amount', [AmountController::class,'create']);

// Route::post('/user', [UserController::class,'store']);
// Route::get('/user', [UserController::class,'show']);
// Route::post('/user/update', [UserController::class,'update']);
// Route::get('/user/list', [UserController::class,'index']);
// Route::delete('/user/{id}' , [UserController::class,'delete']);
// Route::resource('admin', AdminController::class);
