<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\QuienesController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ColaboratorsController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SectionImageController;
use App\Models\SectionImage;
use Illuminate\Support\Facades\Route;

//inicio
Route::get('/', [InicioController::class,'index']);

Route::get('/quienes_somos', function (){
    return view('paginas.quienes.index');
        })->name('quienes.inicio');

Route::get('/proyecto/{proyecto}', [ProyectoController::class,'show'])->name('proyecto.show');
Route::resource('categorias', CategoryController::class);
Route::resource('paginas', PageController::class);
Route::get('secciones/{page}/create', [SectionController::class,'create'])->name('seccion.create');
Route::post('secciones/{page}', [SectionController::class,'store'])->name('seccion.store');
Route::resource('secciones', SectionController::class);
Route::get('imagenes/{image}/create', [SectionImageController::class,'create'])->name('imagen.create');
Route::post('imagenes/{page}', [SectionImageController::class,'store'])->name('imagen.store');
Route::resource('imagenes', SectionImageController::class);

Auth::routes();
//administrador
Route::prefix('admin')->group(function () {
        Route::get('/', function () {
            return view('administrador.inicio');
        })->name('admin.inicio')->middleware('auth');

});
Route::resource('/sliders', SliderController::class)->middleware('auth');
Route::resource('/proyectos', ProyectoController::class)->middleware('auth');
Route::resource('/quienes_somos', QuienesController::class)->middleware('auth');
Route::resource('/colaborador', ColaboratorsController::class)->middleware('auth');
Route::resource('/contacto', ContactsController::class)->middleware('auth');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Middlewares

//AUTH




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
