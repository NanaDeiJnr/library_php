<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\BorrowController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Auth controllers
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// Api Controller
Route::get('/searchBooks', [ApiController::class, 'searchBooks']);
Route::get('/details', [ApiController::class, 'details']);

// Library Controller
Route::post('/borrow', [BorrowController::class, 'borrow']);
