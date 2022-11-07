<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/','home')->name('home');

Route::view('/nosotros','about')->name('about');

Route::view('/documentacion','documentation')->name('documentation');

Route::view('/contacto','contact')->name('contact');

Route::resource('messages','\App\Http\Controllers\MessagesController');

Route::resource('team','\App\Http\Controllers\TeamController');

Route::resource('causas','\App\Http\Controllers\CausasController');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('login');

Route::get('/logout',[\App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');
