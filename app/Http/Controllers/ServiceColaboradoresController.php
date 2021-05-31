<?php

namespace App\Http\Controllers;

use App\Models\Colaborator;
use Illuminate\Http\Request;

class ServiceColaboradoresController extends Controller
{

    public function serviceColaboradores()
    {
	$response = Colaborator::all();
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
