<?php

use App\Http\Controllers\InternshipController;
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

Route::get('/v1/internship',[InternshipController::class,'index']);
Route::post('/v1/internship',[InternshipController::class,'store']);
Route::put('/v1/internship/{id}',[InternshipController::class,'update']);
Route::get('/v1/internship/{id}',[InternshipController::class,'show']);
Route::delete('/v1/internship/{id}',[InternshipController::class,'destroy']);