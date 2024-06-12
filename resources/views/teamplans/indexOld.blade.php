@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="display-6 text-center mt-2 p-0 text-uppercase ">{{__('maintenance plans tasks')}} </h5>
                </div>
                <div class="card-body">
                    @include('partials.success')
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="5%">{{__('ID')}}</th>
                                <th width="35%" class="text-capitalize">{{__('fecha')}}</th>
                                <th width="60%">{{__('Tareas ')}}</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($plans as $plan )
                            <tr>
                                <td scope="row" class="text-capitalize">{{$plan->id}} </td>

                                <td scope="row" class="text-capitalize">
                                    Plan : <strong>{{$plan->name}}</strong>
                                    <hr>
                                    fecha de Inicio: {{fecha($plan->fecha_inicio)}}
                                    <hr>
                                    Inicio de actividades: {{($plan->hora_inicio)}}
                                    <hr>
                                    Número de turnos laborables: {{($plan->turnos_laborables)}}
                                    <hr>
                                    Horas de trabajo semanal: {{($plan->jornada_semanal)}} horas/semana
                                    <hr>
                                    Horas de trabajo diarias: {{($plan->jornada_diaria)}} horas/día
                                    <hr>
                                    Hora de descanso: {{($plan->hora_descanso)}}
                                    <hr>
                                    Minutos de Descanso: {{($plan->horas_descanso)}} minutos/día
                                    <hr>
                                    @if($plan->laborar_sobretiempo) Se laborará Sobretiempo @else Sin labores de
                                    Sobretiempo @endif
                                    <hr>
                                    @if($plan->laborar_feriado) Se laborará en días Feriados @else Sin labores en días
                                    Feriados @endif
                                    <hr>
                                    <strong>Equipos asociados al plan:</strong>
                                    <hr>

                                    @foreach ($plan->equipos as $p)
                                    {{$p->name}} {{$p->tipo}}
                                    <hr>
                                    @endforeach
                                </td>
                                <td>
                                    @can('teamplans.taskteam')
                                    @foreach ($plan->tasks as $t)
                                    @if($t->team_id<>0)
                                        <i class="fa fa-address-book" aria-hidden="true"></i>
                                        @endif
                                    <a href="{{route('teamplans.taskteam',$t->id)}}"
                                        title="equipo de trabajo {{$t->team}}">
                                        {{'cada '.$t->frecuencia}}
                                        @if($t->frecuencia==1){{$frec=' día '}}@else{{$frec=' días '}}@endif
                                        <strong>{{$t->equipo_text}}</strong> => {{$t->tarea}}
                                        <hr>

                                    </a>
                                    @endforeach
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer text-muted  cxy ">
                    <p class="text-center">
                        {{$plans->render()}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        $(() => {
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            });
        });
    });

</script>
@endsection
