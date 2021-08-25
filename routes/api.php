<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\LogController;
use App\Http\Controllers\api\BoxController;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\GameController;

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
Route::apiResource('/box', BoxController::class)->except('show');
Route::apiResource('/game', GameController::class)->except('update');
Route::apiResource('/log', LogController::class)->except('update');
Route::get('/logsByGame/{game}', [LogController::class, 'getLogsByGameId']);
Route::get('/getUsersByGame/{game}', [GameController::class, 'getUsersByGame']);
Route::get('/getBoxesByGame/{game}', [GameController::class, 'getBoxesByGame']);
Route::patch('/reset/{game}', [GameController::class, 'reset']);
