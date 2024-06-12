@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-6 mx-auto">
        <div class="card text-left">
  <img class="card-img-top" src="{{asset('js/holder.js')}}" alt="">
  <div class="card-body">
    <h4 class="card-title">Importar Subsistemas desde archivo excel</h4>
    <p class="card-text">Permite importar datos desde un acrchivo excel de nombre subsistemas.xlsx</p>
      <form action="{{route('subsistemas.importExcel')}} " method="POST" enctype="multipart/form-data">
           @method('POST')
            @csrf
            @if(Session::has('message'))
            <div class="alert alert-success" role="alert">
                  <p>{{Session::get('message')}} </p>
            </div>
            @endif

            <div class="form-group mb-3">
                <label for="sistema_id" class="text-capitalize font-weight-bold">sistema</label>
                <select class="form-control selectpicker text-capitalize" name="sistema_id" id="sistema_id"
                title="{{__('select sistema')}}" required>
                  @foreach ($sistemas as $sistema)
                  <option value="{{$sistema->id}}">{{$sistema->name}}</option>
                @endforeach
                </select>
                @error('sistema_id')
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
      <h4 class="card-title">Vaciar Tabla de subsistemas</h4>
      <p class="card-text">Elimina todos los registros de subsistemas</p>
        <form action="{{route('subsistemas.vaciar')}} " method="POST" enctype="multipart/form-data">
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
