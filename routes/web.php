<?php

use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;

Route::get('/cars', [CarController::class, 'index']);
Route::post('/cars', [CarController::class, 'store']);
