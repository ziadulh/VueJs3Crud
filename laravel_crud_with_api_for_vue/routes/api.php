<?php

use App\Http\Controllers\CreateDataController;
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

Route::get('/create-data/index', [CreateDataController::class, 'index']);
// Route::get('/create-data/{id}/edit', [CreateDataController::class, 'edit']);
Route::get('/create-data/{id}', [CreateDataController::class, 'show']);
Route::post('/create-data', [CreateDataController::class, 'store']);
Route::post('/create-data/update', [CreateDataController::class, 'update']);
Route::post('/create-data/delete/{id}', [CreateDataController::class, 'destroy']);
