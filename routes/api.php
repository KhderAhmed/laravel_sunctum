<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
Route::post('register', [AuthController::class, "register"]);

 Route::post('login', [AuthController::class, "login"]);
 //3|FmQ4XbInP97BYZK5sc6h4BoYZj0C5TrVAKIbyLbcb3324b07

 Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('posts', PostController::class);
});