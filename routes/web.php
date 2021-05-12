<?php

use App\Http\Controllers\InicioController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\QuienesController;
use App\Http\Controllers\SliderController;
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

//inicio
Route::resource('/', InicioController::class);
Route::resource('quienes_somos', QuienesController::class);
Route::resource('proyectos', ProyectoController::class);

Auth::routes();
//administrador
Route::prefix('admin')->group(function () {
        Route::get('/', function () {
            return view('administrador.inicio');
        })->name('admin.inicio')->middleware('auth');
        Route::resource('/sliders', SliderController::class)->middleware('auth');
        Route::resource('/proyectos', ProyectoController::class)->middleware('auth');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Middlewares

//AUTH



