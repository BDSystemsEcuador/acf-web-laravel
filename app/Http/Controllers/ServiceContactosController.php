<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Quienes;
use Illuminate\Http\Request;

class ServiceContactosController extends Controller
{

    public function serviceContactos()
    {
	$response = Contact::all();
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

    public function show($id)
    {
	//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quienes  $quienes
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $quienes)
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
