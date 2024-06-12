@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-md-8 mx-auto bg-ligth">
    <div class="card p-3">
        <div class="card-header p-0">
                <h4  class="shadow-sm bg-dark text-white p-2">
                     <strong>{{$user->name}}</strong>
                </h4>
                <div class="card" style="width: 18rem;">
                    <ul class="list-group list-group-flush">
                    <li class="list-group-item">Professión: @if($user->profile<>null) {{$user->profile->profession}} @else N/A @endif</li>
                    <li class="list-group-item">Especialidad: @if($user->profile<>null) {{$user->profile->specialty}} @else N/A @endif</li>
                    <li class="list-group-item">Ubicación: @if($zona<>null) {{$zona->name}} @else N/A @endif</li>
                    </ul>
                  </div>

          <a class="btn btn-sm float-right btn-info m-3" href="{{route('userzonas.index')}} ">Regresar</a>
        </div>
        <h4  class="shadow-sm bg-dark text-white p-2">Equipos de la zona: {{$zona->name}}  <small class="float-right">cantidad: {{$equipos->count()}} </small></h4>
        <ul class="list-group list-group-flush ">
            @foreach ($equipos as $s)
            <li class="list-group-item"><span class="mr-5">{{$s->name}}</span><span class="ml-5">{{$s->tipo}}</span></li>
            @endforeach
        </ul>

      </div>

    </div>
</div>

@endsection
