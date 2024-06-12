@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center mt-2 p-0 text-uppercase ">{{__('Listado de Fallas')}} </h5>
                    <h6 class="text-center mt-2 p-0 text-uppercase ">{{__('responsable:')}} <em><strong>{{Auth::user()->name}}  </strong></em></h6>
                    <h6 class="text-center mt-2 p-0 text-uppercase ">{{__('zona:')}} <em><strong> {{Auth::user()->zona}}</strong></em> </h6>

                </div>
                <div class="card-body">
                    @include('partials.success')

                    <table aria-colspan="2" id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th width="10%" class="text-capitalize">{{__('zona')}}</th>
                                <th width="20%" class="text-capitalize">{{__('equipo')}}</th>
                                <th width="25%" class="text-capitalize">{{__('falla')}}</th>
                                <th width="30%" class="text-capitalize">{{__('detalles')}}</th>
                                <th width="15%" class="text-center text-capitalize">{{__('actions')}} </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($fallas as $falla )
                            <tr>
                                <small>

                                    <td scope="row" class="text-capitalize">

                                        {{$falla->zona_text}}
                                        <hr>
                                    </td>
                                    <td scope="row" class="text-capitalize">
                                        {{$falla->equipo_text}}
                                        <hr>
                                        {{'reporte: '.$falla->reporte}}
                                        <hr>
                                        <small><em>{{$falla->reportada_fecha}}</small></em>

                                    </td>
                                    <td scope="row" class="text-capitalize">
                                        {{$falla->falla}}
                                    </td>
                                    <td scope="row" class="text-capitalize">
                                        {{$falla->condicion}}
                                        <hr>
                                        {{$falla->created_at->diffForHumans()}}
                                        <hr>
                                        {{'Reportada por: '.$falla->reportada_name}}
                                        <hr>
                                        {{'Responsable: '.$falla->team}}
                                    </td>
                                </small>
                                <td class="text-center">
                                    @can('fallas.orden')
                                    <a href="{{route('fallas.orden',$falla->id)}}"
                                        @if($falla->team_id<>NULL)class="btn btn-outline-success text-capitalize mb-1"
                                        @else class="btn btn-outline-danger text-capitalize mb-1" @endif
                                         data-toggle="tooltip"
                                        data-placement="top" title="{{__('repair order')}} ">
                                        <i class="fa fa-ambulance" aria-hidden="true"></i>
                                    </a>
                                    @endcan
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
    document.addEventListener('DOMContentLoaded', (event) => {
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

            "columnDefs": [{
                "targets": [4],
                "orderable": false
            }],
        });

        $('label').addClass('form-inline');
        $('select, input[type="search"]').addClass('form-control input-sm');
        $('.dataTables_length').addClass('bs-select');
    });

</script>
@endsection
