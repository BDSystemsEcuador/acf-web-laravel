<?php

namespace App\Http\Controllers;

use App\Models\Section;
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
        $image = new SectionImage();

        if($request->hasFile('image')){
            $image['image'] = $request['image']->store('uploads/sectionImages','public');
            $img = Image::make("storage/{$image['image']}")->resize(720, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save();
        }
        $image->section_id = $section_id;
        $image->save();
        return redirect()-> route('imagenes.show',$image->section_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SectionImage  $sectionImage
     * @return \Illuminate\Http\Response
     */
    public function show($sectionImage)
    {
        $images = SectionImage::where('section_id','=',$sectionImage)->get();
        $section = Section::findOrFail($sectionImage);
        return view('menu.images.index',compact('images','section','sectionImage'));
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
