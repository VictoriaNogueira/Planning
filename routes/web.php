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



