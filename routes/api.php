<?php

use App\Http\Controllers\CreateUserController;
use App\Http\Controllers\DeleteUserController;
use App\Http\Controllers\GetMostUsedDomainsController;
use App\Http\Controllers\GetUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UpdateUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::controller(RegisterController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});*/

Route::post('user', CreateUserController::class);
Route::middleware('auth:sanctum')->group( function () {
    Route::get('user/most-used-domains', GetMostUsedDomainsController::class);
    Route::get('user/{id}', GetUserController::class);
    Route::put('user/{id}', UpdateUserController::class);
    Route::delete('user/{id}', DeleteUserController::class);
});
