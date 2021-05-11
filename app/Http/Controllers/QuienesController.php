<?php

namespace App\Http\Controllers;

use App\Models\Quienes;
use Illuminate\Http\Request;

class QuienesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quienes  $quienes
     * @return \Illuminate\Http\Response
     */
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
