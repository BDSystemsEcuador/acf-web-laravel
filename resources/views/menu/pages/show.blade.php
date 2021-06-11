@extends('layouts.main')
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>    
.section__imgs{
        display: flex;
        justify-content: space-evenly;
        align-items: center;
        flex-wrap: wrap;
    }
    .img__section{
        border-radius: 10px;
        margin: 40px 0;
    }
    .contenido-trix{
        margin: 20px auto;
        text-align: justify;
    }
    .url_img{
        width: 23%;
    }
    @media screen and (max-width:768px){
        .url_img{
        width: 100%;
        margin:10px 0;
    }
    }
</style>
@endsection
@section('title','Alas de Colibrí')
@section('body')
<div class="container">
    <div class="contenido-trix">
      @foreach ($page->sections as $section)
        <h2 class="copy-title">{{$section->title}}</h2>
        {!!$section->content!!}
        <div class="section__imgs">
            @foreach ($section->sectionImages as $image)
            <a href="{{asset('storage').'/'.$image->image}}" data-lightbox="roadtrip" class="url_img">
                <img src="{{asset('storage').'/'.$image->image}}" alt="" class="img__section"/>
            </a>
            @endforeach
        </div>
        @endforeach
      </div>
    
</div>


@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection