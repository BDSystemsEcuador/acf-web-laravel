<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Session\Store;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders=Slider::orderBy('id','desc')->get();
        $sliderBorrados=Slider::withTrashed()->get();
        return view('administrador.sliders.index',compact(['sliders','sliderBorrados']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrador.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newSlider= new Slider;
        $newSlider->titulo = $request->input('titulo');
        $newSlider->descripcion = $request->input('descripcion');
        if($request->hasFile('imagen')){
            $newSlider['imagen']=$request->file('imagen')->store('uploads/slider','public');
        }
        $newSlider->save();
        return redirect()-> route('admin.inicio')->with('message','Agregado con éxito');
         }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('administrador.sliders.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $sliderFind=Slider::findOrFail($slider->id);
        $sliderFind->titulo = $request->input('titulo');
        $sliderFind->descripcion = $request->input('descripcion');
        if($request->hasFile('imagen')){
            $sliderFind['imagen']=$request->file('imagen')->store('uploads/slider','public');
        }
        $sliderFind->save();
        return redirect()-> route('sliders.index')->with('message','Editado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
            $slider->delete();
            return redirect()-> route('sliders.index')->with('message','Eliminado con éxito');
    }
}
