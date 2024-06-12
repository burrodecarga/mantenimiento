@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="display-6 text-center mt-2 p-0 text-uppercase ">{{__('Caracteristicas de equipo').' '.__($equipo->name)}} </h4>
                </div>
                <div class="card-body">
                    @include('partials.success')
                    <div class="mb-2">
                    @can('equipocaracteristica.caracteristicas')
                    <a href="{{route('equipocaracteristica.caracteristicas',$equipo->id)}}" class="btn btn-danger btn-sm">Reload Caracteristicas</a>
                    @endcan
                    </div>
                    <table aria-colspan="2" id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                               <th width="40%" class="text-capitalize">{{__('parameter')}}</th>
                               <th width="20%" class="text-capitalize">{{__('valor')}}</th>
                               <th width="10%" class="text-capitalize">{{__('Und.')}}</th>
                               <th width="10%" class="text-capitalize">{{__('Simb.')}}</th>
                                <th width="20%" class="text-center text-capitalize">{{__('actions')}} </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($equipo->caracteristicas as $caracteristica )
                            <tr>

                                <td scope="row" class="text-capitalize">{{$caracteristica->name}} </td>
                                <td scope="row" class="text-capitalize">{{$caracteristica->valor}} </td>
                                <td scope="row" class="text-capitalize">{{$caracteristica->unidad}} </td>
                                <td scope="row" class="text-capitalize">{{$caracteristica->simbolo}} </td>
                                <td class="text-center">
                                    @can('equipocaracteristica.edit')
                                    <a href="{{route('equipocaracteristica.edit',[$equipo->id, $caracteristica->id])}}"
                                        class="btn btn-outline-success text-capitalize" data-toggle="tooltip"
                                        data-placement="top" title="{{__('edit record')}} ">
                                    <i class="fa fa-wrench" aria-hidden="true"></i>
                                    </a>
                                    @endcan
                                    @can('equipos.index')
                                    <a href="{{route('equipos.index')}}"
                                        class="btn btn-outline-primary text-capitalize" data-toggle="tooltip"
                                        data-placement="top" title="{{__('back')}} ">
                                    <i class="fa fa-images" aria-hidden="true"></i>
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

