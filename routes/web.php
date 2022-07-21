<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AmountController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/planning', [AmountController::class,'index']);
//Route::get('/planning/amount', [AmountController::class,'create']);
