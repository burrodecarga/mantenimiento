@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-6 mx-auto">
        <div class="card text-left">
  <img class="card-img-top" src="{{asset('js/holder.js/193x120')}}" alt="">
  <div class="card-body">
    <h4 class="card-title">Importar Sistemas, Subsistemas y equipos desde Archivo Excel</h4>
    <p class="card-text">Permite importar datos desde un acrchivo excel</p>
    @can('equipos.importExcelAll')
      <form action="{{route('equipos.importExcelAll')}} " method="POST" enctype="multipart/form-data">
           @method('POST');
            @csrf
            @if(Session::has('message'))
            <div class="alert alert-success" role="alert">
                  <p>{{Session::get('message')}} </p>
            </div>
            @endif
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
