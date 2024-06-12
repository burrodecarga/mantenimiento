@extends('layouts.app')
@section('content')
<div class="container">
     <div class="row">

        <div class="col-12 col-md-6">
            <div class="">
                @foreach($images as $image)
                <div class="">
                    <a href="#" data-toggle="modal" data-target="#exampleModal">
                        <img src="{{asset('app/'.$image->url)}} " alt="{{$equipo->name}}" class="d-grid img-fluid w-100 mb-1">
                    </a>
                </div>
                @endforeach
            </div>

        </div>
        <div class="col-12 col-md-6">
            <div class="bg-white p-5 shadow rounded">
                <h5>{{$equipo->name}}</h5>
                <hr>
                <h6>Sistema:{{$equipo->sistema}}</h6>
                <h6>Sub Sistema:{{$equipo->subsistema}}</h6>
                <hr>
                <h6>Tipo:{{$equipo->tipo}}</h6>
                <h6>Ubicación:{{$equipo->ubicacion}}</h6>
                <h6>Tipo de Servicio:{{$equipo->servicio}}</h6>
                <hr>
                <p>{{$equipo->description}}</p>
                <div class="col-12">
                    <ul>
                        @foreach ($caracteristicas as $c)
                        <li>{{$c->name.'  :'.$c->valor.'  '.$c->unidad}}</li>
                        @endforeach

                    </ul>
                </div>
                <a href="{{ URL::previous()}}" class="btn btn-danger btn-sm">Regresar</a>

            </div>



        </div>
    </div>
</div>
@endsection
