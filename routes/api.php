<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PhoneCallApiController;
use App\Http\Controllers\Api\UserApiController;

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

Route::as('api.')->group(function () {
    Route::get("/call/{phone_number}", [PhoneCallApiController::class, 'call'])->name('call');
    Route::post("users", [UserApiController::class, 'store'])->name('users.store');
});
