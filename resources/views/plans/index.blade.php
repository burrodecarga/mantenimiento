@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="display-6 text-center mt-2 p-0 text-uppercase ">{{__('maintenance plans')}} </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            @can('´plans.create')
                            <a href="{{route('plans.create')}} " class="btn btn-primary my-2 float-left"
                                title="{{__('add register')}} "><i class="fa fa-plus-circle" aria-hidden="true"></i>
                                {{__('new record')}} </a>
                            @endcan
                        </div>
                        <div class="col">
                        </div>
                    </div>
                    <div class="card-body">
                        @include('partials.success')
                        <table class="table">
                            <thead>
                                <tr>
                                    <th width="5%" class="d-none">{{__('ID')}}</th>
                                    <th width="35%" class="text-capitalize text-center">{{__('detalles del plan')}}</th>
                                    <th width="55%" class="text-capitalize text-center">{{__('Tareas del plan ')}}</th>

                                    <th width="5%" class="text-center text-capitalize">{{__('actions')}} </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($plans as $plan )
                                <tr>
                                    <td scope="row" class="text-capitalize d-none">{{$plan->id}} </td>

                                    <td scope="row" class="text-capitalize">
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                Plan : <strong>{{$plan->name}}</strong>
                                            </li>
                                            <li class="list-group-item">

                                               fecha de Inicio: <strong> {{fecha($plan->fecha_inicio)}}</strong>
                                            </li>
                                            <li class="list-group-item">
                                                Inicio de actividades: <strong>{{($plan->hora_inicio)}}</strong>
                                            </li>
                                            <li class="list-group-item">
                                                Número de turnos laborables: <strong>{{($plan->turnos_laborables)}}</strong>
                                            </li>
                                            <li class="list-group-item">
                                                Horas de trabajo semanal: <strong>{{($plan->jornada_semanal)}}</strong> horas/semana
                                            </li>
                                            <li class="list-group-item">
                                                Horas de trabajo diarias: <strong>{{($plan->jornada_diaria)}}</strong> horas/día
                                            </li>
                                            <li class="list-group-item">
                                                Hora de descanso: <strong>{{($plan->hora_descanso)}}</strong>
                                            </li>
                                            <li class="list-group-item">
                                                Horas de trabajo semanal: <strong>{{($plan->jornada_semanal)}}</strong> horas/semana
                                            </li>
                                            <li class="list-group-item">
                                                Minutos de Descanso: <strong>{{($plan->horas_descanso)}}</strong> minutos/día
                                            </li>

                                            <li class="list-group-item">
                                                @if($plan->laborar_sobretiempo) Se laborará Sobretiempo @else Sin labores de
                                                Sobretiempo @endif
                                            </li>
                                            <li class="list-group-item">
                                                @if($plan->laborar_feriado) Se laborará en días Feriados @else Sin labores en
                                        días Feriados @endif
                                            </li>
                                            <li class="list-group-item">
                                                <strong>Tareas asociados al plan: {{$plan->tasks->count()}}</strong>
                                            </li>
                                        </ul>
                                        <div class="my-2">
                                            <p>
                                                <a class="btn btn-success ml-3" data-toggle="collapse" href="#collapseEquipos" role="button"
                                                    aria-expanded="false" aria-controls="collapseEquipos">
                                                    Equipos registrados en el plan: {{$plan->equipos->count()}}
                                                </a>
                                            </p>
                                            <div class="collapse my-2" id="collapseEquipos">
                                                <div class="card card-body">
                                                    <ul class="list-group">
                                                        @foreach ($plan->equipos as $key=>$p)
                                                        <li class="list-group-item">{{$key+1}} - {{$p->name}} {{$p->tipo}}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div>
                                            <p>
                                                <a class="btn btn-primary ml-3 d-block" data-toggle="collapse" href="#collapseDiario" role="button"
                                                    aria-expanded="false" aria-controls="collapseDiario">
                                                    Tareas Diarias:
                                                </a>
                                            </p>
                                            <div class="collapse my-2" id="collapseDiario">
                                                <div class="card card-body">
                                                    <ul class="list-group">
                                                        @foreach ($plan->tasks->where('frecuencia','=',1) as $key=>$t)
                                                        <li class="list-group-item">{{$key+1}} - {{$t->tarea}}
                                                            @if($t->team_id<>0)
                                                            <i  class="fa fa-address-book text-danger" aria-hidden="true"
                                                            title="equipo de trabajo asignado:  {{$t->team}}"
                                                            ></i>
                                                            @endif
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <p>
                                                <a class="btn btn-primary ml-3 d-block" data-toggle="collapse" href="#collapseSemanal" role="button"
                                                    aria-expanded="false" aria-controls="collapseSemanal">
                                                    Tareas Semanales:
                                                </a>
                                            </p>
                                            <div class="collapse my-2" id="collapseSemanal">
                                                <div class="card card-body">
                                                    <ul class="list-group">
                                                        @foreach ($plan->tasks->where('frecuencia','=',7) as $key=>$t)
                                                        <li class="list-group-item">{{$key+1}} - {{$t->tarea}}
                                                            @if($t->team_id<>0)
                                                            <i  class="fa fa-address-book text-danger" aria-hidden="true"
                                                            title="equipo de trabajo asignado:  {{$t->team}}"
                                                            ></i>
                                                            @endif
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="my-1">
                                            <p>
                                                <a class="btn btn-primary ml-3 d-block" data-toggle="collapse" href="#collapseQuincenal" role="button"
                                                    aria-expanded="false" aria-controls="collapseQuincenal">
                                                    Tareas Quincenales:
                                                </a>
                                            </p>
                                            <div class="collapse my-2" id="collapseQuincenal">
                                                <div class="card card-body">
                                                    <ul class="list-group">
                                                        @foreach ($plan->tasks->where('frecuencia','=',15) as $key=>$t)
                                                        <li class="list-group-item">{{$key+1}} - {{$t->tarea}}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <p>
                                                <a class="btn btn-primary ml-3 d-block" data-toggle="collapse" href="#collapseMensual" role="button"
                                                    aria-expanded="false" aria-controls="collapseMensual">
                                                    Tareas Mensuales:
                                                </a>
                                            </p>
                                            <div class="collapse my-2" id="collapseMensual">
                                                <div class="card card-body">
                                                    <ul class="list-group">
                                                        @foreach ($plan->tasks->where('frecuencia','=',30) as $key=>$t)
                                                        <li class="list-group-item">{{$key+1}} - {{$t->tarea}}
                                                            @if($t->team_id<>0)
                                                            <i  class="fa fa-address-book text-danger" aria-hidden="true"
                                                            title="equipo de trabajo asignado:  {{$t->team}}"
                                                            ></i>
                                                            @endif
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <p>
                                                <a class="btn btn-primary ml-3 d-block" data-toggle="collapse" href="#collapseBimensual" role="button"
                                                    aria-expanded="false" aria-controls="collapseBimensual">
                                                    Tareas Bi-Mensuales:
                                                </a>
                                            </p>
                                            <div class="collapse my-2" id="collapseBimensual">
                                                <div class="card card-body">
                                                    <ul class="list-group">
                                                        @foreach ($plan->tasks->where('frecuencia','=',60) as $key=>$t)
                                                        <li class="list-group-item">{{$key+1}} - {{$t->tarea}}
                                                            @if($t->team_id<>0)
                                                            <i  class="fa fa-address-book text-danger" aria-hidden="true"
                                                            title="equipo de trabajo asignado:  {{$t->team}}"
                                                            ></i>
                                                            @endif
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <p>
                                                <a class="btn btn-primary ml-3 d-block" data-toggle="collapse" href="#collapseTrimestral" role="button"
                                                    aria-expanded="false" aria-controls="collapseTrimestral">
                                                    Tareas Trimestrales:
                                                </a>
                                            </p>
                                            <div class="collapse my-2" id="collapseTrimestral">
                                                <div class="card card-body">
                                                    <ul class="list-group">
                                                        @foreach ($plan->tasks->where('frecuencia','=',90) as $key=>$t)
                                                        <li class="list-group-item">{{$key+1}} - {{$t->tarea}}
                                                            @if($t->team_id<>0)
                                                            <i  class="fa fa-address-book text-danger" aria-hidden="true"
                                                            title="equipo de trabajo asignado:  {{$t->team}}"
                                                            ></i>
                                                            @endif
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <p>
                                                <a class="btn btn-primary ml-3 d-block" data-toggle="collapse" href="#collapseCuatrimestral" role="button"
                                                    aria-expanded="false" aria-controls="collapseCuatrimestral">
                                                    Tareas Cuatrimestrales:
                                                </a>
                                            </p>
                                            <div class="collapse my-2" id="collapseCuatrimestral">
                                                <div class="card card-body">
                                                    <ul class="list-group">
                                                        @foreach ($plan->tasks->where('frecuencia','=',120) as $key=>$t)
                                                        <li class="list-group-item">{{$key+1}} - {{$t->tarea}}
                                                            @if($t->team_id<>0)
                                                            <i  class="fa fa-address-book text-danger" aria-hidden="true"
                                                            title="equipo de trabajo asignado:  {{$t->team}}"
                                                            ></i>
                                                            @endif
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <p>
                                                <a class="btn btn-primary ml-3 d-block" data-toggle="collapse" href="#collapseSemestral" role="button"
                                                    aria-expanded="false" aria-controls="collapseSemestral">
                                                    Tareas Semestrales:
                                                </a>
                                            </p>
                                            <div class="collapse my-2" id="collapseSemestral">
                                                <div class="card card-body">
                                                    <ul class="list-group">
                                                        @foreach ($plan->tasks->where('frecuencia','=','180') as $key=>$t)
                                                        <li class="list-group-item">{{$key+1}} - {{$t->tarea}}
                                                            @if($t->team_id<>0)
                                                            <i  class="fa fa-address-book text-danger" aria-hidden="true"
                                                            title="equipo de trabajo asignado:  {{$t->team}}"
                                                            ></i>
                                                            @endif
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <p>
                                                <a class="btn btn-primary ml-3 d-block" data-toggle="collapse" href="#collapseAnual" role="button"
                                                    aria-expanded="false" aria-controls="collapseAnual">
                                                    Tareas Anuales:
                                                </a>
                                            </p>
                                            <div class="collapse my-2" id="collapseAnual">
                                                <div class="card card-body">
                                                    <ul class="list-group">
                                                        @foreach ($plan->tasks->where('frecuencia','=',360) as $key=>$t)
                                                        <li class="list-group-item">{{$key+1}} - {{$t->tarea}}
                                                            @if($t->team_id<>0)
                                                            <i  class="fa fa-address-book text-danger" aria-hidden="true"
                                                            title="equipo de trabajo asignado:  {{$t->team}}"
                                                            ></i>
                                                            @endif
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @can('plans.add')
                                        <a href="{{route('plans.add',$plan->id)}}"
                                            class="btn btn-outline-primary text-capitalize mb-1" data-toggle="tooltip"
                                            data-placement="top" title="{{__('Add Equipment to plan')}} ">
                                            <i class="fab fa-medapps" aria-hidden="true"></i>
                                        </a>
                                        @endcan
                                        @can('plans.creaTarea')
                                        <a href="{{route('plans.creaTarea',$plan->id)}}"
                                            class="btn btn-outline-primary text-capitalize mb-1" data-toggle="tooltip"
                                            data-placement="top" title="{{__('Crear Tareas para el plan')}} ">
                                            <i class="fa fa-book" aria-hidden="true"></i>
                                        </a>
                                        @can('plans.ajustes')
                                        <a href="{{route('plans.ajustes',$plan->id)}}"
                                            class="btn btn-outline-primary text-capitalize mb-1" data-toggle="tooltip"
                                            data-placement="top" title="{{__('Preparar el plan de Mantenimiento')}} ">
                                            <i class="fa fa-calendar-check" aria-hidden="true"></i>
                                        </a>
                                        @endcan

                                        @can('plans.ajustes')
                                        <a href="{{route('plans.calendario',$plan->id)}}"
                                            class="btn btn-outline-danger text-capitalize mb-1" data-toggle="tooltip"
                                            data-placement="top" title="{{__('Preparar calendario de tareas')}} ">
                                            <i class="fa fa-calendar-alt" aria-hidden="true"></i>
                                        </a>
                                        @endcan

                                        @endcan
                                        @can('plans.edit')
                                        <a href="{{route('plans.edit',$plan->id)}}"
                                            class="btn btn-outline-success text-capitalize mb-1" data-toggle="tooltip"
                                            data-placement="top" title="{{__('edit record')}} ">
                                            <i class="fa fa-wrench" aria-hidden="true"></i>
                                        </a>
                                        @endcan
                                        @can('plans.destroy')
                                        <a class="btn btn-outline-danger text-capitalize mb-2" href="#" onclick="event.preventDefault();
                                                     document.getElementById('delete-form').submit();"
                                            data-toggle="tooltip" data-placement="top" title="{{__('delete record')}} ">

                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>

                                        <form id="delete-form" action="{{route('plans.destroy',$plan->id)}}"
                                            method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
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
