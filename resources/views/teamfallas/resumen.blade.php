@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mx-auto bg-ligth">
            <div class="bg-white rounded p-3">
                <div class="bg-light p-2">
                    <div class="col-12">
                        <h4 class="shadow-sm bg-dark text-white p-2 rounded">Despeje de Falla</h4>
                        @include('partials.success')
                        <div class="row">
                            <div class="col-12 col-md-4  m-0">
                                <div class="alert alert-primary" role="alert">
                                    <ul>
                                        <li>Área: {{$falla->zona_text}}</li>
                                        <li>Equipo: {{$falla->equipo_text}}</li>
                                        <li>Reportada: {{fecha($falla->reportada_fecha)}}</li>
                                        <li>Despejada:{{fecha(now())}}</li>
                                        <li>duración: {{ $dias}} @if($dias>=2)días @else día @endif</li>
                                        <li>Atendida por: {{ $falla->team}}</li>
                                        <li>Despejada por: {{ Auth::user()->name}}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label>Reporte</label>
                                    <div class="alert alert-danger" role="alert">
                                        {{$falla->reporte}}
                                    </div>
                                    <label for=""> {{$falla->team}} </label>
                                    <div class="alert alert-warning" role="alert">
                                        {{$falla->falla}}
                                    </div>
                                    <div class="alert alert-success" role="alert">
                                        detalles: {{$falla->detalles}}
                                    </div>

                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="alert alert-primary" role="alert">
                                    <ul>
                                        <li>Costos de Reparación:</li>
                                        <li>Costo de Repuestos: {{numerico($costo_repuestos)}}</li>
                                        <li>Costo de Insumos: {{numerico($costo_insumos)}}</li>
                                        <li>Costo de Servicios: {{numerico($costo_servicios)}}</li>
                                        <li>Costo de Falla: {{numerico($costo_falla)}}</li>
                                        <li>Costo Mano de Obra: {{numerico($falla->team_costo)}}</li>
                                        <li>Costo Total: {{numerico($falla->team_costo+$costo_falla)}}</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-12 col-md-4">
                                <div class="alert alert-primary" role="alert">
                                    <ul>
                                        <li>Repuestos:</li>
                                        @foreach ($repuestos as $r)
                                        <li>{{$r->cantidad.' '.$r->name}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="alert alert-primary" role="alert">
                                    <ul>
                                        <li>Insumos:</li>
                                        @foreach ($insumos as $r)
                                        <li>{{$r->cantidad.' '.$r->name}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="alert alert-primary" role="alert">
                                    <ul>
                                        <li>Servicios:</li>
                                        @foreach ($servicios as $r)
                                        <li>{{$r->cantidad.' '.$r->name}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                                <div class="d-grid col-12">
                                        @foreach ($imagenes as $imagen)
                                        <div>
                                            <img class="rounded mx-auto img-thumbnail"
                                                src="{{asset('app/'.$imagen->url)}}" alt="{{$imagen->body}}"/>
                                        </div>
                                        @endforeach
                                </div>
                            </div>
                            <div class="alert alert-primary my-2 col-12 cxy" role="alert">
                                <div class="mr-5">
                                Reportada por: {{$falla->reportada_name}}<br>
                                Despejada por: {{Auth::user()->name.', '.$falla->team}}
                                </div>

                                <a class="btn btn-success btn-sm mr-2" href="{{route('teamfallas.confirmar',$falla->id)}}">confirmar</a>
                                <a class="btn btn-danger btn-sm mr-2" href="{{route('teamfallas.report',$falla->id)}}">cancelar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endsection
