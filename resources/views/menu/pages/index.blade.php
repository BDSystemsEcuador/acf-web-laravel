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
    </style>
@endsection
@section('admin')

<table class="table table-bordered">
    <thead>
      <tr>
        <th>
            <div class="d-flex justify-content-between align-items-center">
                <span>Categoría</span> 

                <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalToggleLabel">Categoría</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('categorias.store')}}" method="POST" class="form">
                                @csrf
                                <div class="form-group mb-3">
                                  <label  class="form-label" for="title">Título</label>
                                  <input  class="form-control" type="text" name="title">
                                </div>
                                <div class="form-group mb-3">
                                  <button class="btn btn-danger text-light d-block" type="submit">Agregar</button>
                                </div>
                              </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <a class="btn btn-danger text-light" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Agregar</a>
            </div>
        </th>
        <th>
            <div class="d-flex justify-content-between align-items-center">
                <span>Páginas</span>  
                
                <div class="modal fade" id="exampleModalToggle1" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalToggleLabel">Página</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('paginas.store')}}" method="POST" class="form">
                                @csrf
                                <div class="form-group mb-3">
                                  <label  class="form-label" for="title">Título</label>
                                  <input  class="form-control" type="text" name="title">
                                </div>
                                <div class="form-group mb-3">
                                  <label  class="form-label" for="description">Descripción:</label>
                                  <input  class="form-control" type="text" name="description">
                                </div>
                                <div class="form-group mb-3">
                                  <label  class="form-label" for="category_id">Categoría:</label>
                                  <select name="category_id" id="" class="form-select" >
                                    <option class="form-control" value="" selected>Menú principal</option>
                                    @foreach ($categories as $category)
                                    <option class="form-control" value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                  </select>
                                </div>
                                <div class="form-group mb-3">
                                  <button class="btn btn-primary"  type="submit">Guardar y Continuar</button>
                                </div>
                              </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <a class="btn btn-danger text-light" data-bs-toggle="modal" href="#exampleModalToggle1" role="button">Agregar</a>

                
            </div>
        </th>
      </tr>
    </thead>
    <tbody>
        <tr>
            <th>
                Menú Principal
            </th>
            
            <td>
              @foreach ($pages as $page)
              @if ($page->category_id === null)
              <div class=" d-flex justify-content-between align-items-center mb-4 ">
                <div class=""> 
                  <a class="d-block fw-bold h4" href="{{route('paginas.show',$page->id)}}" target="_blank" title="Ver página">{{$page->title}}</a>
                  <span><span class="fw-bold">Descripción:</span> {{$page->description}}</span>
                </div>
                <div>
                  <a href="{{route('secciones.show',$page->id)}}" class="icon icon--edit"><i class="fas fa-edit"></i></a>
                  <form class="d-inline-block" action="{{route('paginas.destroy',$page->id)}}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="icon icon--delete"><i class="fas fa-trash-alt"></i></button>
                  </form>
                </div>
            </div>
            @endif
            @endforeach
            </td>
        </tr>
        @foreach ($categories as $category)
            <tr>
                <th class="d-flex justify-content-between align-items-center border-0">
                    <div>
                       {{$category->title}}
                    </div>  
                    <div>
                  
                      <a class="icon icon--edit" href="{{route('categorias.edit',$category->id)}}"><i class="fas fa-edit"></i></a>
                        <form class="d-inline-block" action="{{route('categorias.destroy',$category->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="icon icon--delete"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </div>
                </th>
                
                <td>
                  @foreach ($category->pages as $page)
                        <div class=" d-flex justify-content-between align-items-center mb-4 ">
                            <div class=""> 
                                <a class="fw-bold h4" href="{{route('paginas.show',$page->id)}}" target="_blank" title="Ver página">{{$page->title}}</a>
                                <br>
                                <span><span class="fw-bold">Descripción:</span> {{$page->description}}</span>
                            </div>
                            <div>
                                <a href="{{route('secciones.show',$page->id)}}" class="icon icon--edit"><i class="fas fa-edit"></i></a>
                                <form class="d-inline-block" action="{{route('paginas.destroy',$page->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="icon icon--delete"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </div>
                        </div>
                  @endforeach
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>

  @endsection
  