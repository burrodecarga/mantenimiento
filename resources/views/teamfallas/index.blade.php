@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header text-sm" style="font-size:60%;">
                    <h5 class="text-center mt-2 p-0 text-uppercase ">{{__('Listado de Fallas a despejar:')}}</h5>
                    <h6 class="text-center mt-2 p-0 text-uppercase ">{{__('responsable:')}} <em><strong>{{Auth::user()->name}}  </strong></em></h6>
                    <h6 class="text-center mt-2 p-0 text-uppercase ">{{__('equipo de tarea:')}} <em><strong>{{Auth::user()->teams->pluck('name')->first()}} </strong></em> </h6>
                    <h6 class="text-center mt-2 p-0 text-uppercase ">{{__('zona:')}} <em><strong> {{Auth::user()->zona}}</strong></em> </h6>
                </div>
                <div class="card-body ">
                    @include('partials.success')

                    <table aria-colspan="2" id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                               <th width="10%" class="text-capitalize d-none">{{__('zona')}}</th>
                               <th width="30%" class="text-capitalize">{{__('equipo')}}</th>
                               <th width="25%" class="text-capitalize">{{__('falla')}}</th>
                               <th width="20%" class="text-capitalize">{{__('detalle')}}</th>
                               <th width="15%" class="text-center text-capitalize">{{__('actions')}} </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($fallas as $falla )
                            <tr>
                                <td scope="row" class="text-capitalize d-none">
                                   {{$falla->zona_id}}
                                </td>
                                 <td scope="row" class="text-capitalize">
                                    {{$falla->equipo->name}}
                                </td>
                                <td scope="row" class="text-capitalize">
                                  {{'reportada por: '.$falla->reportada_name}}
                                  <hr>
                                  {{'reportada: '.$falla->created_at->diffForHumans()}}
                                  <hr>
                                  {{'condición: '.$falla->condicion}}
                                </td>
                                <td scope="row" class="text-capitalize">
                                    {{$falla->reporte}}
                                  </td>

                                <td class="text-center">
                                    @can('teamfallas.report')
                                    <a href="{{route('teamfallas.report',$falla->id)}}"
                                        class="btn btn-outline-danger text-capitalize mb-1" data-toggle="tooltip"
                                        data-placement="top" title="{{__('atención de falla')}} ">
                                        <i class="fa fa-charging-station" aria-hidden="true"></i>
                                    </a>
                                    @endcan

                                    <a href="#"
                                        class="btn btn-outline-primary text-capitalize mb-1" data-toggle="tooltip"
                                        data-placement="top" title="{{__('equipmen of zone***')}} ">
                                        <i class="fab fa-whmcs" aria-hidden="true"></i>
                                    </a>


                                </td>
                            </tr>
                            @endforeach
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
 document.addEventListener('DOMContentLoaded', (event) =>{
    table = $('#example').DataTable({

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

       "columnDefs": [{ "targets": [ 4 ], "orderable": false }],
        });

        $('label').addClass('form-inline');
        $('select, input[type="search"]').addClass('form-control input-sm');
        $('.dataTables_length').addClass('bs-select');
} );




</script>
@endsection

