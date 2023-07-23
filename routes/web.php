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

// use Native\Laravel\Facades\Notification;
// Notification::title('Hello from NativePHP')
// ->message('This is a detail message coming from your Laravel app.')
// ->show();

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
