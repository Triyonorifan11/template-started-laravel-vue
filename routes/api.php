<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api;
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

Route::post('/auth/login', [Api\AuthController::class, 'login'])->middleware(['html.entities.converter', 'custom.throttle:10,1']);
Route::post('/auth/register', [Api\AuthController::class, 'register'])->middleware(['html.entities.converter', 'custom.throttle:10,1']);
Route::post('/auth/verify-email/{id}', [Api\AuthController::class, 'verifyEmailUser'])->middleware(['html.entities.converter', 'custom.throttle:10,1']);
// Route::post('/auth/forgot-password', [Api\ForgotPasswordController::class, 'sendResetLinkEmail'])->middleware(['html.entities.converter', 'custom.throttle:10,1']);
// Route::post('/auth/reset-password/{token}', [Api\ForgotPasswordController::class, 'resetPassword'])->middleware(['html.entities.converter', 'custom.throttle:10,1'])->name('password.reset');


Route::group(['middleware' => 'auth:sanctum'], function () {
    //Auth
    Route::group(['prefix' => 'auth'], function () {
        Route::post('/logout', [Api\AuthController::class, 'logout'])->middleware(['role:super-admin,customer,admin,developer,reviewer']);
        Route::get('/me', [Api\AuthController::class, 'me'])->middleware(['role:super-admin,customer,admin,developer,reviewer']);
        Route::put('/change-password', [Api\AuthController::class, 'changePassword'])->middleware(['role:super-admin,customer,admin,developer']);
    });
    Route::group(['prefix' => 'select-list'], function () {
        Route::get('/roles', [Api\SelectListController::class, 'roles'])->middleware(['role:admin,super-admin,developer']);
    });
});