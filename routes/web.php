<?php

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

use Illuminate\Support\Facades\Route;

Route::get('/welcome-test', function () {
  return view('welcome');
});

// React App EndPoint
Route::redirect('/home', '/', 302);

Route::get('/{any}', function () {
  return view('index');
})->where('any', '.*');