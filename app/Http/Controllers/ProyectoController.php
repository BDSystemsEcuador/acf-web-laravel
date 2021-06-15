<?php

namespace App\Http\Controllers;

use App\Http\Requests\Projects\StoreProjectRequest;
use App\Http\Requests\Projects\UpdateProjectRequest;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Storage;
class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectos = Proyecto::orderBy('id','desc')->simplePaginate(8);
        return view('administrador.proyectos.index',compact('proyectos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrador.proyectos.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $newProyecto= new Proyecto;
        $newProyecto->titulo = $request->input('titulo');
        $newProyecto->mini_descripcion = $request->input('mini_descripcion');
        $newProyecto->descripcion = $request->input('descripcion');
        if($request->hasFile('imagen')){
            $newProyecto['imagen'] = $request['imagen']->store('uploads/proyectos','public');
            $img = Image::make("storage/{$newProyecto['imagen']}")->fit(1240,720);
            $img->save();
        }
        $newProyecto->save();
        return redirect()-> route('proyectos.index')->with('message','Proyecto agregado con éxito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function show(Proyecto $proyecto)
    {
        return view('paginas.proyecto.show',compact('proyecto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function edit(Proyecto $proyecto)
    {
        return view('administrador.proyectos.edit',compact('proyecto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Proyecto $proyecto)
    {
        $proyectoFind=Proyecto::findOrFail($proyecto->id);
        $proyectoFind->titulo = $request->input('titulo');
        $proyectoFind->mini_descripcion = $request->input('mini_descripcion');
        $proyectoFind->descripcion = $request->input('descripcion');
        if($request->hasFile('imagen')){
            Storage::delete("public/{$proyectoFind->imagen}");
            $proyectoFind['imagen'] = $request['imagen']->store('uploads/proyectos','public');
            $img = Image::make("storage/{$proyectoFind['imagen']}")->fit(1240,720);
            $img->save();
        }
        $proyectoFind->save();
        return redirect()->route('proyectos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proyecto $proyecto)
    {
        Storage::delete("public/{$proyecto->imagen}");
        $proyecto->delete();
        return redirect()-> route('proyectos.index')->with('message','Eliminado con éxito');
    }
}
