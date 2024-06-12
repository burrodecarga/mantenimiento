@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card">
                    <div class="card-header">
                            <h5 class="text-dark text-center mt-2 p-0 text-uppercase ">{{__('list of equipments')}} </h5>
                    </div>
                <div class="card-body">
                        @include('partials.success')
                        <div class="row cxy">
                            <div class="col-6">
                                @can('equipos.create')
                                <a href="{{route('equipos.create')}} " class="btn btn-primary my-2 float-left" title="{{__('add register')}} "><i class="fa fa-plus-circle" aria-hidden="true"></i> {{__('new record')}} </a>
                                @endcan
                            </div>
                            <div class="col-6">
                                @can('equipos.formImportExcel')
                                <a href="{{route('equipos.formImportExcel')}}" class="btn btn-primary"><i class="fa fa-download" aria-hidden="true"></i> </a>
                                @endcan
                            </div>
                        </div>



                    <table id="equipos" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th width="20%" class="text-capitalize text-center d-none">{{__('Id')}}</th>
                                    <th width="20%" class="text-capitalize text-center">{{__('ubicación')}}</th>
                                    <th width="20%" class="text-capitalize">{{__('equipo')}}</th>
                                    <th width="20%">{{__('tipo')}}</th>
                                    <th width="25%" >{{__('description')}}</th>
                                    <th width="15%" class="text-center text-capitalize">{{__('actions')}} </th>
                                </tr>
                            </thead>
                            <tbody>

                          </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
document.addEventListener('DOMContentLoaded', function() {
	$(() => {
        $(function () {
        $('[data-toggle="tooltip"]').tooltip()
        });
    });

   table = $('#equipos').DataTable({

    ajax: `indexNewSource`,
    columns: [

        {data: 'id',visible:false},
        { data: 'ubicacion',render: function ( data, type, row ) {
                    return data +'<hr> ('+ row['sistema'] +')'+'<hr> ('+ row['subsistema'] +')';
                }},
        { data: 'name' },
        { data: 'tipo' },
        { data: 'description' },
        { data: 'btn' }
    ],

       "sPaginationType": "bootstrap",
           "pagingType":"full_numbers",
           "language":{
             "info": "Pag.  _PAGE_ de _PAGES_  páginas,  Total: _TOTAL_ ",
               "search":"Buscar  ",
               "paginate":{
                   "next":"Sig.",
                   "previous":"Ant.",
                   "last":"Último",
                   "first":"Primero",
               },
               "lengthMenu":"Mostrar  <select class='custom-select custom-select-sm'>"+
                             "<option value='5'>5</option>"+
                             "<option value='10'>10</option>"+
                             "<option value='15'>15</option>"+
                             "<option value='20'>20</option>"+
                             "<option value='25'>25</option>"+
                             "<option value='50'>50</option>"+
                             "<option value='100'>100</option>"+
                             "<option value='-1'>Todos</option>"+
                             "</select> Registros",
               "loadingRecord":"Cargando....",
               "processing":"Procesando...",
               "emptyTable":"No hay Registros",
               "zeroRecords":"No hay coincidencias",
               "infoEmpty":"",
               "infoFiltered":""
           },
           "columnDefs": [{ "targets": [ 5 ], "orderable": false }],

        });

        $('label').addClass('form-inline');
        $('select, input[type="search"]').addClass('form-control input-sm');
        $('.dataTables_length').addClass('bs-select');
});
</script>
@endsection
