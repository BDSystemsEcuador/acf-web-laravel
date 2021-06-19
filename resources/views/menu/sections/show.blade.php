@extends('administrador.layouts.main')
@section('styles')

    <style>
        .icon{
            border: 1px solid rgba(0, 0, 0, 0.425);
            display: inline-block;
            width: 35px;
            height: 35px;
            display: inline-flex;
            justify-content: center;
            align-items: center;
        }
        .fas{
            color: white;
        }
        .icon--edit{
            background: rgb(0, 101, 233) ;
        }
        .icon--edit:hover{
            background: rgb(0, 81, 185) ;
        }
        .icon--delete{
            background:rgb(218, 52, 1) ;
        }
        .icon--delete:hover{
            background:rgb(165, 39, 1) ;
        }
        .icon--camera{
            background:rgb(149, 1, 218) ;
        }
        .icon--camera:hover{
            background:rgb(125, 0, 184) ;
        }
    </style>
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
                justify-content:flex-start ;
                flex-wrap: wrap;
                margin: 20px;
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
                display: inline-block;
                width: 25%;
                height: 150px;
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
@section('admin')
<div class="d-flex justify-content-between align-items-center">  
  <h5 class="text-danger m-3">Página {{$page->title}}</h5>
  <div class="">
      <a href="{{route('paginas.index')}}" class="">Ir a páginas</a>
    </div>

</div>

<div class="row" >
<div class="col-12">

    <form action="{{route('paginas.update',$page->id)}}" method="POST" class="form" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
          <label  class="form-label" for="title">Título</label>
          <input  class="form-control" type="text" name="title" value="{{$page->title}}">
        </div>
        <div class="form-group mb-3">
          <label  class="form-label" for="description">Descripción:</label>
          <input  class="form-control" type="text" name="description" value="{{$page->description}}">
        </div>
        <div class="form-group mb-3">
          <label  class="form-label" for="category_id">Categoría:</label>
          <select name="category_id" id="" class="form-select" >
              
            <option class="form-control" value="" >Menú principal</option>
            @foreach ($categories as $category)
                <option class="form-control" value="{{$category->id}}" {{$category->id == $page->category_id? "selected": ""}}>{{$category->title}}</option>
            @endforeach
          </select>
        </div>
        <a href="{{asset("storage").'/'.$page->image}}" data-lightbox="roadtrip"><img style="height: 100px; width:auto;" src="{{asset("storage").'/'.$page->image}}" alt=""/></a>
        <div class="mb-3">
            <label for="image" class="form-label">Imagen</label>
            <input class="form-control" type="file" name="image">
          </div>
        <div class="form-group mb-3">
          <button class="btn btn-primary"  type="submit">Editar y Guardar</button>
        </div>
      </form>

    <table class="table">
        <thead>
            <tr>
                <th>
                    <span>Sección</span>
                </th>
                <th class="d-flex justify-content-end align-items-center">
                    <a href="{{route('seccion.create',$page->id)}}" class="btn btn-danger text-light">Nueva Sección</a>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($page->sections as $section)
            <tr>
                <td>
                    <a href="{{route('paginas.show',$page->id)}}" target="_blank" title="Ver página">{{$section->title}}</a>
                    {!!$section->content!!}
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
                </td>
                <td class="d-flex justify-content-end align-items-center">
                    <a href="{{route('imagenes.show',$section->id)}}" class="icon icon--camera"><i class="fas fa-camera"></i></a>
                    <a href="{{route('secciones.edit',$section->id)}}" class="icon icon--edit"><i class="fas fa-edit"></i></a>
                    <form class="d-inline-block" action="{{route('secciones.destroy',$section->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="icon icon--delete"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>

  @endsection
  