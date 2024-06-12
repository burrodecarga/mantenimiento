@extends('layouts.app')
@section('content')
<form action="{{route('equipocaracteristica.imagenStore',$equipo->id)}}"
    method="post"
    enctype="multipart/form-data"
    class="col-6 mx-auto bg-white shadhow p-5 rounded">
    @include('partials.error')
    @method('post')
    @csrf
    <div class="card">
         <div class="card-header">
              <h5 class="text-center">Agregar Imagen</h5>
         </div>
        <div class="card-body">
            <div class="form-group">
      <label for="body">Detalles de la imagen</label>
      <textarea name="body" id="body" class="form-control"
      placeholder="Detalles de la imagen"></textarea>
     </div>
    <div class="form-group">
           <input type="file" name="file" id="file">
    </div>

    <div class="form-group">
         <button class="btn btn-success" type="submit" role="button">enviar</button>
    </div>

        </div>
    </div>





</form>
@endsection
