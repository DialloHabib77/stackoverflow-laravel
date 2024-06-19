<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('/answer', \App\Http\Controllers\AnswersController::class);
Route::apiResource('/question', App\Http\Controllers\QuestionController::class);
Route::apiResource('/theme', App\Http\Controllers\ThemeController::class);
Route::apiResource('/user', App\Http\Controllers\UserController::class);

Route::post('/login', [App\Http\Controllers\UserController::class, 'login']);

