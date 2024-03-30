<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/transactions', [\App\Http\Controllers\TransactionController::class, 'index']);
Route::get('/mock-response', [\App\Http\Controllers\TransactionController::class, 'getMockResponse']);
Route::post('/payment', [\App\Http\Controllers\TransactionController::class, 'create']);
Route::put('/update-transaction', [\App\Http\Controllers\TransactionController::class, 'update']);

