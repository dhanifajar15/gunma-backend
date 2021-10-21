<?php

use App\Http\Controllers\InternshipController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


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
Route::post('/v1/internship/{userId}',[InternshipController::class,'store']);
Route::put('/v1/internship/{internshipId}',[InternshipController::class,'update']);
Route::get('/v1/internship/{internshipId}',[InternshipController::class,'show']);
Route::delete('/v1/internship/{internshipId}',[InternshipController::class,'destroy'])
;
Route::post('register-user', [UserController::class, 'register']);
Route::post('login-user', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [UserController::class, 'fetch']);
    Route::post('update-profile', [UserController::class, 'updateProfile']);
    Route::post('logout', [UserController::class, 'logout']);
});