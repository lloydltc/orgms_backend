<?php

use App\Http\Controllers\API\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);



Route::middleware('auth:api')->group(function () {
    Route::get('user/{id}', [AuthController::class, 'getUser']);
    Route::post('contribute', [ApiController::class,'makeContribution']);
    
    Route::get('contributions/{id}', [ApiController::class,'contributions']);
    // our routes to be protected will go in here
    Route::post('/logout', [AuthController::class,'logout'])->name('logout.api');
});