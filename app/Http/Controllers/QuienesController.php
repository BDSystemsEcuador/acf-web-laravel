<?php

namespace App\Http\Controllers;

use App\Models\Quienes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QuienesController extends Controller
{

    public function index()
    {
        return view('paginas.quienes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	//dd($request->input('seccion'));
	dd($request->all());
	//$test= "hola";
	//$response = $test;
        $newRow= new Quienes;
        $newRow->seccion = $request->input('seccion');
        $newRow->titulo = $request->input('titulo');
        $newRow->contenido = $request->input('contenido');
        if($request->hasFile('photo')){
            $newRow['imagen']=$request->file('photo')->store('uploads/quienes','public');
        }
        $newRow->save();

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
    public function update(Request $request, Quienes $quienes_somo)
    {
	//dd($request->all());

        $currentRow=Quienes::findOrFail($quienes_somo->id);
        $currentRow->seccion = $request->input('seccion');
        $currentRow->titulo = $request->input('titulo');
        $currentRow->contenido = $request->input('contenido');
        $filename= $request->input('seccion');
        if($request->hasFile('photo')){
	    $guessExtension = $request->file('photo')->guessExtension();
	    $newfilename=$filename.'.'.$guessExtension;
	    // Deleting old file and and adding new
	    Storage::delete('uploads/quienes'.$newfilename);
	    $currentRow['imagen']=$request->file('photo')->storeAs('uploads/quienes',$filename.'.'.$guessExtension, 'public');
        }
        $currentRow->save();
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
