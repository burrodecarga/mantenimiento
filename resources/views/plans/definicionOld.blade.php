@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header">
                <h4 class="text-dark d-flex">
                    <div class="alert alert-primary mr-1 w-75" role="alert">
                      control de tareas : {{$plan->name}}<hr>
                       equipo: {{$equipo->name}}<hr>
                       tipo: {{$equipo->tipo}}<hr>
                    </div>
                    <div class="alert alert-secondary mr-1 w-25" role="alert">
                <h5>total tareas: {{$equipo->tareas_de_equipo()->count()}}</h5><hr>
                <h5>ubicacion: {{$equipo->ubicacion}}</h5>
                    </div>
                    </h4>

                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($equipo->tareas_de_equipo as $i=>$t)
                    <a href="{{route('plans.recursosEdit',[$t->plan_id,$equipo->id,$t->id])}}" class="btn btn-primary btn-sm mb-2 my-2">Costos de tarea :{{$t->tarea}}</a>
                       <li class="list-group-item">
                        @can('plans.team')
                       <a href="{{route('plans.recursos',$t->id)}}" class="d-flex flex-row w-100">
                        <div class="alert alert-primary mr-1 w-25" role="alert">
                            <span class="cxy">Tarea N°: {{$i+1}}</span><hr>
                         <span class="cxy">{{$t->team}}</span><hr>
                         <span class="cxy">Responsable:{{$t->responsable}}</span><hr>
                        </div>

                        <div class="alert alert-danger mr-1 w-25" role="alert">
                            <span title="protocolo"class="cxy">{{$t->protocolo}}</span><hr>
                            <span title="Tipo de riesgo"class="cxy">{{$t->seguridad}}</span><hr>
                            <span title="Necesidad de Permisos"class="cxy">Necesario Permiso : {{$t->permisos}}</span><hr>
                            <span title="Condición operativa del equipo"class="cxy"> {{$t->condiciones}}</span>
                            <span title="protocolo"class="cxy">cada {{$t->frecuencia}} día(s)</span><hr>
                        </div>

                        <div class="alert alert-primary mr-1 w-25" role="alert">
                            <span title="Tipo de Tarea a Realizar"class="cxy">{{$t->tarea_tipo}}</span><hr>
                            <span title="Tarea a Realizar"class="cxy">{{$t->tarea}}</span><hr>
                            <span title="Tiempo estimado, horas"class="cxy">tiempo estimado: {{$t->duracion}} hora(s)</span><hr>
                            <span title="Fecha de Inicio"class="cxy">Fecha de Inicio: {{fecha($t->fecha_inicio)}}</span><hr>
                            <span title="Hora de Inicio"class="cxy">Hora de Inicio: {{$t->hora_inicio}}</span><hr>
                        </div>

                        <div class="alert alert-success w-25" role="alert">
                            <span title="Detalles de la tarea"class="cxy">{{$t->detalles}}</span><hr>
                        </div>
                        </a>
                        @endcan
                       </li>
                    @endforeach
                    </ul>
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


        table = $('#pla').DataTable({
            "sPaginationType": "bootstrap",
            "pagingType": "full_numbers",
            "language": {
                "info": "Pag.  _PAGE_ de _PAGES_  páginas,  Total: _TOTAL_ ",
                "search": "Buscar  ",
                "paginate": {
                    "next": "Sig.",
                    "previous": "Ant.",
                    "last": "Último",
                    "first": "Primero",
                },
                "lengthMenu": "Mostrar  <select class='custom-select custom-select-sm'>" +
                    "<option value='5'>5</option>" +
                    "<option value='10'>10</option>" +
                    "<option value='15'>15</option>" +
                    "<option value='20'>20</option>" +
                    "<option value='25'>25</option>" +
                    "<option value='50'>50</option>" +
                    "<option value='100'>100</option>" +
                    "<option value='-1'>Todos</option>" +
                    "</select> Registros",
                "loadingRecord": "Cargando....",
                "processing": "Procesando...",
                "emptyTable": "No hay Registros",
                "zeroRecords": "No hay coincidencias",
                "infoEmpty": "",
                "infoFiltered": ""
            },
            "columnDefs": [{
                "targets": [2],
                "orderable": false
            }],

        });

        $('label').addClass('form-inline');
        $('select, input[type="search"]').addClass('form-control input-sm');
        $('.dataTables_length').addClass('bs-select');
    });

</script>
@endsection
