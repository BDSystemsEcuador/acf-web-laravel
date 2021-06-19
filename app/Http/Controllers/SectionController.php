<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Page;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('menu.sections.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($page)
    {
        $page = Page::with('sections')->find($page);
        return view('menu.sections.create',compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $page)
    {
        $section = new Section;
        $section->title = $request->title;
        $section->content = $request->content;
        $section->page_id = $page;
        $section->save();
        $page = Page::findOrFail($page);
        $categories = Category::all();
        return view('menu.sections.show',compact('page','categories'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show($page)
    {
        $page = Page::with('sections')->findOrFail($page);
        $categories = Category::all();
        return view('menu.sections.show',compact('page','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit($section)
    {
        $section = Section::findOrFail($section);
        return view('menu.sections.edit', compact('section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $section)
    {
        $section = Section::findOrFail($section);
        $section->title = $request->input('title');
        $section->content = $request->input('content');
        $section->save();
        return redirect()->route('secciones.show',$section->page);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy($section)
    {
        $section = Section::with('page')->findOrFail($section);
        $page = $section->page;
        $section->delete();
        return redirect()->route('secciones.show',$page);
    }
}
