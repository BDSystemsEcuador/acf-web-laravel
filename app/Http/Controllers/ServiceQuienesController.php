<?php

namespace App\Http\Controllers;

use App\Models\Quienes;
use Illuminate\Http\Request;

class ServiceQuienesController extends Controller
{

    public function serviceQuienes()
    {
	$response = Quienes::all();
	return $response;
    }

    public static function findSlug($slug)
    {
	return Quienes::where('seccion', $slug)->first();
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

    public function show(Quienes $quienes)
    {
	//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quienes  $quienes
     * @return \Illuminate\Http\Response
     */
    public function edit(Quienes $quienes)
    {
	//
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quienes  $quienes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quienes $quienes)
    {
	//
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quienes  $quienes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quienes $quienes)
    {
	//
    }
}
