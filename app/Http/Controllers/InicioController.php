<?php

namespace App\Http\Controllers;

use App\Models\Inicio;
use App\Models\Proyecto;
use App\Models\Slider;
use App\Models\Pagina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InicioController extends Controller
{
    public function index()
    {
        $paginas = Pagina::query()->select(['id','titulo'])->get();
        $sliders=Slider::query()->select(['titulo','descripcion','imagen'])->get();
        $proyectos = Proyecto::query()->select(['id','titulo','mini_descripcion','imagen'])->orderBy('id','desc')->simplePaginate(5);
        return view('paginas.inicio.index',compact(['sliders','proyectos']));
    }
    public function links()
    {
        $paginas = Pagina::query()->select(['id','titulo'])->get();
        return $paginas;
    }
}

