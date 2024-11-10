<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiWeb;

Route::group(['middleware' => 'auth:sanctum'], function () {
    //Auth
   
    Route::group(['prefix' => 'select-list'], function () {
        // Route::get('/roles', [Api\SelectListController::class, 'roles'])->middleware(['role:admin,super-admin,developer']);
    });

    Route::group([
        'prefix' => 'roles',
        'middleware' => ['role:super-admin,admin,developer']
    ], function () {
        Route::get('/', [ApiWeb\RolesController::class, 'index']);
    });
});