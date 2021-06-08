  @extends('administrador.layouts.main')
  @section('admin')
  <div class="d-flex justify-content-between align-items-center">  
    <h5 class="text-danger m-3">Crear Categoria</h5>
  </div>
  <section class="section">
    <form action="{{route('categorias.store')}}" method="POST" class="form">
      @csrf
      <div class="form-group mb-3">
        <label  class="form-label" for="title">Título</label>
        <input  class="form-control" type="text" name="title">
      </div>
      <div class="form-group mb-3">
        <button class="btn btn-primary" type="submit">Guardar</button>
      </div>
    </form>
  </section>
  @endsection
  