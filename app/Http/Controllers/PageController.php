<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $pages = Page::with('category')->orderBy('title', 'DESC')->get();
        return view('menu.pages.index',compact('categories','pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('menu.pages.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $page = Page::create($request->all());
        return redirect()->route('secciones.show',$page);
        // return redirect()->route('paginas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = Page::findOrFail($id);
        return view('menu.pages.show',compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit($page)
    {
        $page = Page::findOrFail($page);
        $categories = Category::all();
        return view('menu.pages.edit',compact(['page','categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $page)
    {
        $page = Page::findOrFail($page);
        $page->title = $request->input('title');
        $page->description = $request->input('description');
        $page->category_id = $request->input('category_id');
        $page->save();
        return redirect()->route('secciones.show',$page->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy($page)
    {
        $page = Page::findOrFail($page);
        $page->delete();
        return redirect()->route('paginas.index');
    }
}
