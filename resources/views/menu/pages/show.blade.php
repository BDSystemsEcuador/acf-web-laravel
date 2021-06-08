@extends('layouts.main')
@section('title','Alas de Colibrí')
@section('styles')
<style>
    .page{
        padding: 30px 0;
}
</style>
@endsection
@section('body')
<div class="container page">
<div class="header">
    <h1 class="copy-title">{{$page->title}}</h1>
    <p class="copy-subtitle">{{$page->description}}</p>
</div>
@foreach ($page->sections as $section)
<section class="section">
    <h2 class="copy-title">{{$section->title}}</h2>
    <p>{!!$section->content!!}</p>
    <div class="section__imgs">
        @foreach ($section->sectionImages as $image)
        
        <img src="{{asset('storage').'/'.$image->image}}" alt="" class="img__show-project"/>
        <span>{{$image->title}}</span>
        @endforeach
    </div>
</section>
@endforeach
</div>
@endsection

