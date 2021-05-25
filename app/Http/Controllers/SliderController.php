<?php

namespace App\Http\Controllers;

use App\Http\Requests\Sliders\StoreRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Session\Store;

class SliderController extends Controller
{
    public function index()
    {
        $sliders=Slider::orderBy('id','desc')->simplePaginate(4);
        return view('administrador.sliders.index',compact('sliders'));
    }

    public function create()
    {
        return view('administrador.sliders.create');
    }

    public function store(StoreRequest $request)
    {
        $newSlider= new Slider;
        $newSlider->titulo = $request->input('titulo');
        $newSlider->descripcion = $request->input('descripcion');
        if($request->hasFile('imagen')){
            $newSlider['imagen']=$request->file('imagen')->store('uploads/slider','public');
        }
        $newSlider->save();
        return redirect()-> route('sliders.index')->with('message','Imagen añadida a galería');
    }

    public function edit(Slider $slider)
    {
        return view('administrador.sliders.edit',compact('slider'));
    }

    public function update(StoreRequest $request, Slider $slider)
    {
        $sliderFind=Slider::findOrFail($slider->id);
        $sliderFind->titulo = $request->input('titulo');
        $sliderFind->descripcion = $request->input('descripcion');
        if($request->hasFile('imagen')){
            $sliderFind['imagen']=$request->file('imagen')->store('uploads/slider','public');
        }
        $sliderFind->save();
        return redirect()-> route('sliders.index')->with('message','Imagen editada con éxito');
    }

    public function destroy(Slider $slider)
    {
            $slider->delete();
            return redirect()-> route('sliders.index')->with('message','Imagen eliminada con éxito');
    }
}
