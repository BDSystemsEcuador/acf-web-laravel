<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Inicio;
use App\Models\Page;
use App\Models\Proyecto;
use App\Models\SectionImage;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InicioController extends Controller
{
    public function index()
    {
        $sliders=Slider::query()->select(['titulo','descripcion','imagen'])->orderBy('id','desc')->get();
        // $proyectos = Proyecto::query()->select(['id','titulo','mini_descripcion','imagen'])->orderBy('id','desc')->simplePaginate(5);
        $pages = Category::findOrFail(1)->pages;
        $proyectos = Page::where('category_id','=',1)->paginate(4);
        // $imagesProyects = array_reverse($imagesProyects);
        return view('paginas.inicio.index',compact(['sliders','proyectos']));
    }
}
