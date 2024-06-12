@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="display-6 text-center mt-2 p-0 text-uppercase ">{{__('Calendario de tareas')}} </h5>
                </div>
                <div class="card-body">

                    <div>
                        @include('calendarios.partials.seleccion')
                        @include('partials.success')
                        <table class="table text-center" id="calendario">
                            <thead>
                                <tr>
                                    <th width="10%" class="text-capitalize d-none">{{__('ID')}}</th>
                                    <th width="10%" class="text-capitalize">{{__('Plan')}}</th>
                                    <th width="10%" class="text-capitalize">{{__('frec./días')}}</th>
                                    <th width="15%" class="text-capitalize">{{__('fecha')}}</th>
                                    <th width="15%">{{__('equipo')}}</th>
                                    <th width="30%">{{__('tarea')}}</th>
                                    <th width="10%">{{__('responsable')}}</th>
                                    <th width="10%" class="text-center text-capitalize">{{__('actions')}} </th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
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

<div class="modal fade" id="costoModel" tabindex="-1" role="dialog" aria-labelledby="costoModel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Datos de recursos planificados para tarea</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-auto">
                <div class="card bg-dark" style="width: 27rem;">
                    <div class="card-body">
                        <h5 class="card-title" id="equipo"></h5>
                        <h6 class="card-subtitle" id="Mitarea">tarea</h6>
                        <ul class="list-group-item" id="listado">
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

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

       fill_datatable()

        $('#filtrar').click(function(){
            var filter_plan=$('#plan').val();
            var filter_frecuencia=$('#frecuencia').val();
            alert(filter_frecuencia+'  '+filter_plan);
           if(filter_frecuencia!='' || filter_plan !=''){
                 $('#calendario').DataTable().destroy();
                 fill_datatable(filter_plan,filter_frecuencia);
           }else{
               alert('Para filtrar debe seleccionar Plan y Frecuencia....')
           }
      });

      $('#reset').click(function(){
           $('#plan').val('');
           $('#frecuencia').val('');
        $('#calendario').DataTable().destroy();
        fill_datatable();
      });






        $('label').addClass('form-inline');
        $('select, input[type="search"]').addClass('form-control input-sm');
        $('.dataTables_length').addClass('bs-select');
        $('body').on('click', '.show-task', function () {
            var task_id = $(this).data('id');
            $.get(`/calendarios/show/` + task_id, function (data) {
                console.log(data.tarea);
                $('#taskModel').modal('show');
                $('#equipo').text(data.equipo_text);
                $('#tarea_tipo').text(data.tarea_tipo);
                $('#tarea').text(data.tarea);
                $('#detalles').text(data.detalles);
                $('#seguridad').text('riesgo :  ' + data.seguridad);
                $('#condicion').text('condición : ' + data.condiciones);
                $('#permiso').text('¿necesario permiso ? :  ' + data.permisos);
                $('#hora_inicio').text('hora de inicio : ' + data.hora_inicio);
                $('#hora_fin').text('hora de culminación : ' + data.hora_fin);
                $('#duracion').text('duración : ' + data.duracion + ' hora(s)');
                $('#responsable').text('responsable : ' + data.responsable);
                $('#team').text('Equipo de trabajo : ' + data.team);
            });
        });

        $('body').on('click', '.show-cost', function () {
            var task_id = $(this).data('id');
            var tarea = $(this).data('tarea');
            var herramientas = 0;
            var insumos = 0;
            var servicios = 0;
            var repuestos = 0;
            $.get(`/calendarios/showCostos/` + task_id, function (data) {
                console.log(data);
                $html = '';
                $('#costoModel').modal('show');
                // $.each(data, function(i, item) {
                //  //alert(data[i].name);
                // });
                $.each(data, function (i, item) {
                    //alert(item.name);
                    $html += "<li class='list-group-item'>" + '  ' + item.name + "  cant.: " + item.cantidad + "</li>";
                });
                $('#Mitarea').text('tarea : ' + tarea);
                $('#listado').append($html);
            });
        });

    });

    function seleccionar(){
        plan=document.getElementById('filter_plan');
        frecuencia=document.getElementById('frecuencia');
        console.log('xx');
        console.log(plan);

    }

    function fill_datatable(filter_plan,filter_frecuencia){
        table = $('#calendario').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
              url:"{{route('calendarios.index')}}",
              data:{filter_plan:filter_plan, filter_frecuencia:filter_frecuencia}
            },
            columns: [
                { data: 'id', visible: false },
                { data: 'plan' },
                { data: 'periocidad' },
                { data: "fecha_inicio", render: function (data, type, row) { return moment(data).format('DD/MM/YYYY'); } },
                { data: 'equipo_text' },
                { data: 'tarea' },
                { data: 'responsable' },
                { data: 'btn' },
            ],
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
            //"columnDefs": [{ "targets": [6], "orderable": false }],
        })
}

</script>
@endsection
