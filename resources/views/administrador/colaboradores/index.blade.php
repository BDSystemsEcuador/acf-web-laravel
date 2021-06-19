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
        .colaborador__img{
	height: 50px;
	width: auto;
	object-fit: contain;
}
    </style>
@endsection
@section('admin')
<div class="d-flex justify-content-between align-items-center">  
    <h5 class="text-danger m-3">Colaboradores</h5>
    <a href="{{route('colaborador.create')}}" class="btn btn-danger text-light">Nuevo</a>
  </div>
<table class="table">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Web</th>
			<th>Logo</th>
			<th></th>
		</tr>
	</thead>

	<tbody>
		@foreach ($colaborators as $colaborador)
        <tr>
			<th>
				{{ $colaborador->name}}
			</th>
			<td>
				<a href="{{ $colaborador->link}}">{{ $colaborador->link}}</a>
			</td>
			<td>
                <a href="{{asset("storage").'/'.$colaborador->image}}" data-lightbox="roadtrip"><img style="height: 50px; width:auto;" src="{{asset("storage").'/'.$colaborador->image}}" alt=""/></a>
			</td>
			<td>
				<a href="{{route('colaborador.edit',$colaborador->id)}}" class="icon icon--edit"><i class="fas fa-edit"></i></a>
                <form class="d-inline-block" action="{{route('colaborador.destroy',$colaborador->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="icon icon--delete"><i class="fas fa-trash-alt"></i></button>
                </form>
        	</td>
		</tr>
        @endforeach
	</tbody>
</table>

  @endsection
  