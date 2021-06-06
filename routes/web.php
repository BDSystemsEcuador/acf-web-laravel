<?php

use App\Http\Controllers\InicioController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\QuienesController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ColaboratorsController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\PaginaController;
use App\Http\Controllers\SeccionController;
use App\Http\Controllers\SeccionImagenController;
use Illuminate\Support\Facades\Route;

//inicio
Route::get('/', [InicioController::class,'index']);
Route::get('/quienes_somos', function (){
    return view('paginas.quienes.index');
        })->name('quienes.inicio');

Route::get('/proyecto/{proyecto}', [ProyectoController::class,'show'])->name('proyecto.show');
Route::get('/paginas/{pagina}', [PaginaController::class,'show'])->name('paginas.show');

Auth::routes();
//administrador
Route::prefix('admin')->group(function () {
        Route::get('/', function () {
            return view('administrador.inicio');
        })->name('admin.inicio')->middleware('auth');
        Route::resource('/sliders', SliderController::class)->middleware('auth');
        Route::resource('/proyectos', ProyectoController::class)->middleware('auth');
	Route::resource('/quienes_somos', QuienesController::class)->middleware('auth');
	Route::resource('/colaborador', ColaboratorsController::class)->middleware('auth');
	Route::resource('/contacto', ContactsController::class)->middleware('auth');
    Route::resource('/paginas', PaginaController::class)->middleware('auth');
    Route::resource('/secciones', SeccionController::class)->middleware('auth');
    Route::get('/paginas/secciones/{id}/imagenes/create', [SeccionImagenController::class,'create'])->name('secciones_imagenes.create')->middleware('auth');
    Route::get('/paginas/secciones/{id}/imagenes', [SeccionImagenController::class,'index'])->name('secciones_imagenes.index')->middleware('auth');

    Route::resource('/imagenes', SeccionImagenController::class)->middleware('auth');
    Route::get('/paginas/{id}/secciones', [SeccionController::class,'index'])->name('secciones.index')->middleware('auth');
    Route::get('/paginas/{id}/secciones/create', [SeccionController::class,'create'])->name('secciones.create')->middleware('auth');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Middlewares

//AUTH




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
