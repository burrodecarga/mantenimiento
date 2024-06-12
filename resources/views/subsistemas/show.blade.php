@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-md-8 mx-auto bg-ligth">
    <div class="card p-3">
        <div class="card-header p-0">
                <h4  class="shadow-sm bg-dark text-white p-2">
                     Sistema
                </h4>
          <p class="ml-2">
             {{$sistema}}
          </p>
          <a class="btn btn-sm float-right btn-info m-3" href="{{route('subsistemas.index')}} ">Regresar</a>
        </div>
        <h4  class="shadow-sm bg-dark text-white p-2">Subsistema</h4>
        <p class="ml-2"> {{$subsistema->name}}</p>
     <p class="ml-2">
        {{$subsistema->description}}
     </p>
            <h4 class="shadow-sm bg-dark text-white p-2">Equipos <small class="float-right">cantidad:{{$equipos->count()}}</small></h4>
        <ul class="list-group list-group-flush">
            @foreach ($equipos as $e)
            <li class="list-group-item">{{$e->name}}</li>
            @endforeach
        </ul>
      </div>

    </div>
</div>

@endsection
