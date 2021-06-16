@extends('layouts.main')
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>    
.contenido-trix{
    margin: 5px auto;
    text-align: justify;
    border: none;
}
.section__imgs{
        width: 100%;
        display: flex;
        align-items: center;
        justify-content:center ;
        flex-wrap: wrap;
        margin: 20px auto;
    }
    .img__section{
        object-fit: cover;
        height: inherit;
        margin: 10px;
        transition: 0.5s all;
    }
   .img__section:hover{
        transform: scale(1.03);
        box-shadow: 0px 0px 3px blacrgba(0, 0, 0, 0.788)
        border-radius: 5px;
        filter: brightness(1.2);
    }

    .url_img{
        display: block;
        margin: auto;
        width: 25%;
        height: 200px;
        overflow: hidden;
    }
    .copy-title{
        margin-top: 0;
    }
    .img__section--una{
        object-fit: contain;
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
    @foreach ($page->sections as $section)
    <div class="contenido-trix">
      <div class="contenido-trix__txt">
          <h2 class="copy-title">{{$section->title}}</h2>
          {!!$section->content!!}
        </div>
        <div class="section__imgs">
            @foreach ($section->sectionImages as $image)
                @if (count($section->sectionImages)>1)
                    <a href="{{asset('storage').'/'.$image->image}}" data-lightbox="roadtrip" class="url_img">
                        <img src="{{asset('storage').'/'.$image->image}}" alt="" class="img__section"/>
                    </a>
                @else
                <a href="{{asset('storage').'/'.$image->image}}" data-lightbox="roadtrip" class="url_img">
                    <img src="{{asset('storage').'/'.$image->image}}" alt="" class="img__section img__section--una"/>
                </a>
                @endif

            @endforeach
        </div>
    </div>
    @endforeach
    
</div>


@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection