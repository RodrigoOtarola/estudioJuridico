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

//Route::view('/','home')->name('home');

Route::get('/',[\App\Http\Controllers\HomeController::class,'index'])->name('home');

Route::get('/noticias/listar',[\App\Http\Controllers\HomeController::class,'listarNoticias'])->name('listarNoticias');

Route::resource('noticias','\App\Http\Controllers\HomeController');

Route::resource('usuarios','\App\Http\Controllers\UsersController');

Route::view('/nosotros','about')->name('about');

//Route::view('/documentacion','documentation')->name('documentation');

Route::get('/documentacion',[\App\Http\Controllers\DocumentationController::class,'leyes'])->name('documentation');

//Route::get('/documentacion1+',[\App\Http\Controllers\DocumentationController::class|,'feriados'])->name('documentation');

Route::view('/contacto','contact')->name('contact');

Route::resource('messages','\App\Http\Controllers\MessagesController');

Route::resource('team','\App\Http\Controllers\TeamController');

Route::resource('causas','\App\Http\Controllers\CausasController');

Route::get('/causas/{id}/crearComentario',[\App\Http\Controllers\CausasController::class,'crearComentario'])->name('crearComentario');

Route::post('/guardarComentario',[\App\Http\Controllers\CausasController::class,'guardarComentario'])->name('guardarComentario');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('login');

Route::get('/logout',[\App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');
