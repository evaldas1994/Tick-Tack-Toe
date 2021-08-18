<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\BoxController;
use App\Http\Controllers\api\UserController;

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

Route::apiResource('/user', UserController::class);
Route::apiResource('/box', BoxController::class)->except('store', 'show', 'destroy');
