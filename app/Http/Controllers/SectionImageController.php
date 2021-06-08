<?php

namespace App\Http\Controllers;

use App\Models\SectionImage;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SectionImageController extends Controller
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
    public function create($section)
    {
        return view('menu.images.create',compact('section'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $section_id)
    {
        $image= new SectionImage();
        $image->title = $request->input('title');
        if($request->hasFile('image')){
            $image['image'] = $request['image']->store('uploads/sectionImages','public');
            $img = Image::make(public_path("storage/{$image['image']}"))->fit(1240,720);
            $img->save();
        }
        $image->section_id = $section_id;
        $image->save();
        return redirect()-> route('imagenes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SectionImage  $sectionImage
     * @return \Illuminate\Http\Response
     */
    public function show($sectionImage)
    {
        $images = SectionImage::all();
        return view('menu.images.index',compact('images','sectionImage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SectionImage  $sectionImage
     * @return \Illuminate\Http\Response
     */
    public function edit(SectionImage $sectionImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SectionImage  $sectionImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SectionImage $sectionImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SectionImage  $sectionImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(SectionImage $sectionImage)
    {
        //
    }
}
