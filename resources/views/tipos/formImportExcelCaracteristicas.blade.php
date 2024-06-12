@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-6 mx-auto">
        <div class="card text-left">
  <img class="card-img-top" src="{{asset('js/holder.js')}}" alt="">
  <div class="card-body">
    <h4 class="card-title">Importar caracteristicas a tipo de equipo desde Archivo Excel</h4>
    <p class="card-text">Permite importar datos desde un acrchivo excel llamado caracteristicas.xlsx</p>
      <form action="{{route('tipos.importExcelCaracteristicas')}} " method="POST" enctype="multipart/form-data">
           @method('POST');
            @csrf
            @if(Session::has('message'))

            <div class="alert alert-success" role="alert">
                  <p>{{Session::get('message')}} </p>
            </div>



            @endif

            <div class="form-group mb-3">
                <label for="tipo_id" class="text-capitalize font-weight-bold">tipo</label>
                <select class="form-control selectpicker text-capitalize" name="tipo_id" id="tipo_id"
                title="{{__('select tipo')}}" required>
                  @foreach ($tipos as $tipo)
                  <option value="{{$tipo->id}}">{{$tipo->name}}</option>
                @endforeach
                </select>
                @error('tipo_id')
                <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
                @enderror
            </div>
            <input type="file" name="file" id="file">
            <button type="submit">Importar</button>
        </form>
    </div>
</div>

<hr>

<div class="card text-left">
    <img class="card-img-top" src="{{asset('js/holder.js')}}" alt="">
    <div class="card-body">
      <h4 class="card-title">Vaciar Tabla decaracteristicas de Equipos</h4>
      <p class="card-text">Elimina todos los registros de caracteristicas</p>
        <form action="{{route('tipos.vaciar')}} " method="POST" enctype="multipart/form-data">
             @method('POST');
              @csrf
              @if(Session::has('message'))

              <div class="alert alert-success" role="alert">
                    <p>{{Session::get('message')}} </p>
              </div>

              @endif
              <button type="submit">Vaciar Tabla</button>
          </form>
      </div>
  </div>

</div>
    </div>

@endsection
