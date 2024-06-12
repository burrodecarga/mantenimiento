@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-6 mx-auto">
        <div class="card text-left">
  <img class="card-img-top" src="{{asset('js/holder.js/193x120')}}" alt="">
  <div class="card-body">
    <h4 class="card-title">Importar equipos desde Archivo Excel</h4>
    <p class="card-text">Permite importar datos desde un acrchivo excel llamado equipos.xlsx</p>
    @can('equipos.importExcel')
      <form action="{{route('equipos.importExcel')}} " method="POST" enctype="multipart/form-data">
           @method('POST');
            @csrf
            @if(Session::has('message'))
            <div class="alert alert-success" role="alert">
                  <p>{{Session::get('message')}} </p>
            </div>
            @endif

            <div class="form-group mb-3">
                    <label for="subsistema_id" class="text-capitalize font-weight-bold">subsistema</label>
                    <select class="form-control selectpicker text-capitalize" name="subsistema_id" id="subsistema_id"
                    title="{{__('select subsistema')}}" required>
                      @foreach ($subsistemas as $subsistema)
                      <option value="{{$subsistema->id}}">{{$subsistema->sistema.' - '.$subsistema->name}}</option>
                    @endforeach
                    </select>
                    @error('subsistema_id')
                    <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="tipo_id" class="text-capitalize font-weight-bold">Tipo de Equipo</label>
                    <select class="form-control selectpicker text-capitalize" name="tipo_id" id="tipo_id"
                    title="{{__('select tipo de Equipo')}}" required>
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
    @endcan
    </div>
</div>

<hr>

<div class="card text-left">
    <img class="card-img-top" src="{{asset('js/holder.js')}}" alt="">
    <div class="card-body">
      <h4 class="card-title">Vaciar Tabla de Equipos</h4>
      <p class="card-text">Elimina todos los registros de equipos</p>
        <form action="{{route('equipos.vaciar')}} " method="POST" enctype="multipart/form-data">
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
