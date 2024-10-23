<?php

use App\Http\Controllers\MailController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ZipController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("notifications", [MailController::class, "index"]);
Route::get("post", [PostController::class, "index"]);
Route::post("post", [PostController::class, "store"])->name('post.store');
Route::get("users", [UserController::class, "index"]);
Route::post("users/autocomplete", [UserController::class, "autocomplete"])->name('user.autocomplete');
Route::get("zip", [ZipController::class, "indexzip"]);
Route::get("zip-danlowd", [ZipController::class, "danlowd"])->name("zip.danlowd");