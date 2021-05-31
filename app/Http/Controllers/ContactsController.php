<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
	//dd($request->all());
        $newRow= new Contact;
        $newRow->name = $request->input('name');
        $newRow->movil_phone = $request->input('movil_phone');
        $newRow->telephone = $request->input('telephone');
        $newRow->e_mail = $request->input('e_mail');
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

    public function update(Request $request, $id)
    {
        $currentRow=Contact::findOrFail($id);
        $currentRow->name = $request->input('name');
        $currentRow->movil_phone = $request->input('movil_phone');
        $currentRow->telephone = $request->input('telephone');
        $currentRow->e_mail = $request->input('e_mail');
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
        $currentRow=Contact::findOrFail($id);
	//dd($currentRow['image']);
           $currentRow->delete();
    }
}
