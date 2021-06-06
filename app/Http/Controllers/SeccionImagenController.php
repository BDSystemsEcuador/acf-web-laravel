<?php

namespace App\Http\Controllers;

use App\Models\Seccion;
use App\Models\SeccionImagen;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SeccionImagenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $seccion = Seccion::findOrFail($id);
        $imagenes = SeccionImagen::all();
        return view('administrador.paginas.secciones.imagenes.index',compact('seccion','imagenes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $seccion = Seccion::findOrFail($id);
        return view('administrador.paginas.secciones.imagenes.create',compact('seccion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imagen = new SeccionImagen();
        if($request->hasFile('imagen')){
            $imagen['imagen'] = $request['imagen']->store('uploads/seccionesImg','public');
            $img = Image::make(public_path("storage/{$imagen['imagen']}"))->fit(1240,720);
            $img->save();
        }
        $imagen->seccion_id=$request->input('seccion_id');
        $imagen->save();
        return redirect()->route('secciones_imagenes.create',$request->input('seccion_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $id;
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
