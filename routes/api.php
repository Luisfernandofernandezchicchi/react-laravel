<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZapatosController;
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
Route::get('/zapatos',[ZapatosController::class,'show']);
Route::post('/zapatos', [ZapatosController::class, 'store']);
Route::delete('/zapatos/{id}', [ZapatosController::class, 'delete']);
Route::put('/zapatos/{id}', [ZapatosController::class, 'edit']);