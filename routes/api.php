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

Route::post('login', [App\Http\Controllers\Api\LoginController::class, 'login']);

use App\Http\Controllers\OfficeController;
Route::get('/offices', [OfficeController::class, 'index'])->middleware('auth:sanctum');
Route::post('/offices', [OfficeController::class, 'store'])->middleware('auth:sanctum');
Route::put('/offices/{id}', [OfficeController::class, 'update'])->middleware('auth:sanctum');
Route::get('/offices/{id}', [OfficeController::class, 'show'])->middleware('auth:sanctum');
Route::delete('/offices/{id}', [OfficeController::class, 'destroy'])->middleware('auth:sanctum');

use App\Http\Controllers\CurrencyController;
Route::get('/currencies', [CurrencyController::class, 'index'])->middleware('auth:sanctum');
