@extends('layouts.app')
@section('content')
@section('css')
<style>
    html {
        scroll-behavior: smooth;
    }

    .plan {
        height: 38vw;
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        grid-template-rows: repeat(7, 1fr);
        gap: 1px;
        align-content: center;
        border-radius: 16px;

    }

    .box {
        background: rgb(244, 247, 247);
        padding: 5px;
        text-align: center;
        color: rgb(43, 43, 4);
        display: flex;
        flex-direction: column;
    }

    .titulo {
        grid-column: 1/-1;
        grid-row: 1;
        font-weight: bold;
        font-size: x-large;
        font-style: italic;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;

    }

    .span-1 {
        font-weight: bold;
        font-size: large;
        font-style: italic;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }

    .equipo {
        grid-column: 1/3;
        grid-row: 2;
    }

    .tarea {
        grid-column: 3/4;
        grid-row: 2;
    }

    .detalles {
        grid-column: 4/6;
        grid-row: 2/4;
    }

    .fechas {
        grid-column: 1/2;
        grid-row: 3/4;
    }

    .horas {
        grid-column: 2/3;
        grid-row: 3/4;
    }

    .duracion {
        grid-column: 3/4;
        grid-row: 3/4;
    }

    .permisos {

        grid-column: 1/2;
        grid-row: 4/7;
        display: grid;
        grid-template-columns: 1fr;
        grid-template-rows: repeat(6, 1fr);
    }

    .team {
        grid-column: 2/3;
        grid-row: 4/5;
    }

    .listado{
        font-size: 80%;
    }

</style>
@endsection
<div class="container">
    <div class="row">
                @foreach ($equipo->tareas_de_equipo as $i=>$t)
        <div class="col-md-12 mx-auto mb-5" id="{{$t->tarea_posicion}}">
            <div class="plan">
                        <div class="box titulo cxy">Datos de la tarea N°:{{$t->tarea_posicion}}</div>
                        <div class="box equipo"><span class="span-1">Maquinaria o equipo</span
                                class="span-1"><span>{{$equipo->name}}
                                <hr>
                                tipo: {{$equipo->tipo}}
                                <hr>
                                ubicacion: {{$equipo->ubicacion}}
                            </span>
                        </div>
                        <div class="box tarea"><span class="span-1">tarea</span><span>tarea</span></div>
                        <div class="box frecuencia"><span class="span-1">frecuencia</span><span>frecuencia</span></div>
                        <div class="box posicion"><span class="span-1">posición</span><span>posición</span></div>
                        <div class="box restriccion"><span class="span-1">restricción</span><span>restricción</span></div>
                        <div class="box tipo"><span class="span-1">tipo de tarea</span><span>tipo </span></div>
                        <div class="box detalles"><span class="span-1">detalles de la tarea</span>
                            <span>detalles Lorem ipsum dolor, sit amet consectetur adipisicing elit. Distinctio adipisci, quasi
                                tem
                                pora fugit facilis id quae in sint corrupti tenetur ex nobis officiis ratione quibusdam aliquid?
                                Rep
                                rehenderit consequuntur nostrum molestiae neque dignissimos eaque sequi!</span>
                            <h5>total tareas: {{$equipo->tareas_de_equipo()->count()}}</h5>
                            <hr>
                        </div>
                        <div class="box fechas"><span class="span-1">fecha inicio</span>22/07/2020<span class="span-1">fecha
                                fin</span>23/07/2020</div>
                        <div class="box horas"><span class="span-1">hora inicio</span>10:00:00<span class="span-1">hora
                                fin</span>11:30:00</div>
                        <div class="box duracion"><span class="span-1">duracion estimada</span> 12 hora(s)</div>
                        <div class="box permisos">
                            <div class="btn btn-outline-danger p-2 my-2 text-center border-1">
                                <span class="span-1">necesario permisos : si</span>
                            </div>
                            <div class="btn btn-outline-danger p-2 my-2 text-center border-1">
                                <span class="span-1">riesgo mínimo</span>
                            </div>
                            <div class="btn btn-outline-danger p-2 my-2 text-center border-1">
                                <span class="span-1">maquinaria detenida</span>
                            </div>
                        </div>
                        <div class="box team">
                            equipo de tarea: Equipo de tarea
                        </div>
                        <div class="box responsable">
                            <div class="span-1">Responsable</div>Juan Bdc Responsable
                        </div>
                        <div class="box herramientas">@include('plans.partials.herramientas')</div>
                        <div class="box repuestos">@include('plans.partials.repuestos')</div>
                        <div class="box servicios">@include('plans.partials.costos')</div>
                        <div class="box">
                            <div class="span-1">Avances</div>23%
                        </div>
                        <div class="box">@include('plans.partials.insumos')</div>
                        <div class="box">@include('plans.partials.servicios')</div>
                        <div class="box">
                            <a href="{{route('plans.recursosEdit',[$t->plan_id,$equipo->id,$t->id])}}"
                                class="btn btn-primary btn-sm mb-2 my-2">Modificar Costos de tarea</a>
                        </div>
                        <div class="box">
                            @can('plans.team')
                            <a href="{{route('plans.recursos',$t->id)}}" class="btn btn-primary btn-sm mb-2 my-2"> Recursos de
                                la tarea</a>
                            @endcan
                        </div>
                        <div class="box">20</div>
                        <div class="box">21</div>
                        <div class="box d-block ">
                            <a href="#{{$t->tarea_posicion-5}}" class="btn btn-outline-success"
                                title="subir a tarea {{$t->tarea_posicion-5}}"><i class="fa fa-sort-amount-up"></i></a>
                            <a href="#{{$t->tarea_posicion+1}}" class="btn btn-outline-primary"
                                title="bajar a tarea {{$t->tarea_posicion+1}}"><i class="fas fa-level-down-alt"></i></a>

                            <a href="#{{$t->tarea_posicion-1}}" class="btn btn-outline-primary"
                                title="subir a tarea {{$t->tarea_posicion-1}}"><i class="fas fa-level-up-alt"></i></a>
                            <a href="#{{$t->tarea_posicion+5}}" class="btn btn-outline-success"
                                title="bajar a tarea {{$t->tarea_posicion+5}}"><i class="fa fa-sort-amount-down"></i></a>

                        </div>
            </div>
         </div>
      @endforeach
    </div>
</div>
@endsection
