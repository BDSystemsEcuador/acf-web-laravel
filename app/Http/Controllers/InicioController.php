<?php

namespace App\Http\Controllers;

use App\Models\Inicio;
use App\Models\Proyecto;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InicioController extends Controller
{
    public function index()
    {
        $sliders=Slider::query()->select(['titulo','descripcion','imagen'])->get();
        $proyectos = Proyecto::query()->select(['id','titulo','mini_descripcion','imagen'])->orderBy('id','desc')->simplePaginate(5);
        return view('paginas.inicio.index',compact(['sliders','proyectos']));
    }
}
