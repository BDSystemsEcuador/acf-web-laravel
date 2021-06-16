<?php

namespace App\Http\Controllers;

use App\Models\Colaborator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ColaboratorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colaborators = Colaborator::all();
        return view('administrador.colaboradores.index',compact('colaborators'));
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
	
        $newRow= new Colaborator;
        $newRow->name = $request->input('name');
        $newRow->link = $request->input('link');
        if($request->hasFile('image')){
            $newRow['image']=$request->file('image')->store('uploads/colaboradores','public');
        }
        $newRow->save();
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $currentRow=Colaborator::findOrFail($id);
        $currentRow->name = $request->input('name');
        $currentRow->link = $request->input('link');
        $filename= $request->input('name');
        if($request->hasFile('image')){
	    $guessExtension = $request->file('image')->guessExtension();
	    $newfilename=$filename.'.'.$guessExtension;
	    // Deleting old file and and adding new
	    Storage::delete('uploads/colaboradores'.$newfilename);
	    $currentRow['image']=$request->file('image')->storeAs('uploads/colaboradores',$filename.'.'.$guessExtension, 'public');
        }
        $currentRow->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $currentRow=Colaborator::findOrFail($id);
	//dd($currentRow['image']);
	   Storage::disk('public')->delete($currentRow['image']);
           $currentRow->delete();
           return redirect()->route('colaborador.index');
    }
}
