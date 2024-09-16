<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::any('/admin/{all}', function () {
    return view('admin');
})->where('all', '^(?!api).*$');

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/login', function () {
    return view('admin');
});

Route::get('/', function () {
    return view('landing-page');
});

Route::any('{all}', function () {
    return view('landing-page');
})->where('all', '^(?!api).*$');
