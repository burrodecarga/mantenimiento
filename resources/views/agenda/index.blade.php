@extends('layouts.app')
@section('content')
<link href="{{ asset('assets\fullcalendar\packages\core\main.css')}}"  rel='stylesheet' />
<link href="{{ asset('assets\fullcalendar\packages\daygrid\main.css')}}"  rel='stylesheet' />
<link href="{{ asset('assets\fullcalendar\packages\timegrid\main.css')}}"  rel='stylesheet' />
<link href="{{ asset('assets\fullcalendar\packages\list\main.css')}}"  rel='stylesheet'/>

<div class="container bg-white p-2 rounded">
 <div class="card p-3">
      <div
      id="calendar"
      data-route-load-event="{{route('routeLoadEvent')}}"
      data-route-update-event="{{route('routeUpdateEvent')}}"
      data-lav=@json($lunesAViernes)
      data-las=@json($lunesASabado)
      data-ilm=@json($inicioLaboresManana)
      data-ilt=@json($inicioLaboresTarde)
      data-flm=@json($finLaboresManana)
      data-flt=@json($finLaboresTarde)

      ></div>
 </div>
</div>

<div class="modal fade" id="taskModel" tabindex="-1" role="dialog" aria-labelledby="taskModel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Datos de tarea</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-auto">
                <div class="card" style="width: 27rem;">
                    <div class="card-body bg-primary text-white">
                        <h5 class="card-title" id="equipo"></h5>
                        <h6 class="card-subtitle mb-2 " id="tarea_tipo"></h6>
                        <h6 class="card-subtitle mb-2 " id="tarea"></h6>
                        <p class="card-text" id="detalles">.</p>
                        <p class="card-text mb-0" id="seguridad"></p>
                        <p class="card-text mb-0" id="condicion"></p>
                        <p class="card-text" id="permiso"></p>
                        <p class="card-text mb-0" id="hora_inicio">Card link</p>
                        <p class="card-text mb-0" id="hora_fin">Another link</p>
                        <p class="card-text" id="duracion">Another link</p>
                        <p class="card-text mb-0" id="responsable">Another link</p>
                        <p class="card-text" id="team">Another link</p>
                    </div>
                </div>
                <label id="tarea"></label>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>

@endsection
@section('script')

<script src="{{ asset('assets\fullcalendar\packages\core\main.js')}}" defer ></script>
<script src="{{ asset('assets\fullcalendar\packages\interaction\main.js')}}" defer ></script>
<script src="{{ asset('assets\fullcalendar\packages\daygrid\main.js')}}" defer ></script>
<script src="{{ asset('assets\fullcalendar\packages\timegrid\main.js')}}" defer ></script>
<script src="{{ asset('assets\fullcalendar\packages\list\main.js')}}" defer ></script>
<script src="{{ asset('assets\fullcalendar\packages\moment\main.js')}}" defer ></script>
<script src="{{ asset('assets\fullcalendar\packages\list\main.js')}}" defer ></script>
<script src="{{ asset('assets\fullcalendar\packages\core\locales\es.js')}}" defer ></script>
<script src="{{ asset('js\popper.min.js')}}" defer ></script>
<script src="{{ asset('js\agenda.js')}}" defer ></script>

@endsection
