@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="display-6 text-center mt-2 p-0 text-uppercase ">{{__('equipments type')}} </h5>
                </div>
                <div class="card-body">
                    @include('partials.success')
                    <div class="row cxy">
                        <div class="col-6">
                            @can('tipos.create')
                            <a href="{{route('tipos.create')}} " class="btn btn-primary my-2 float-left" title="{{__('add register')}} "><i class="fa fa-plus-circle" aria-hidden="true"></i> {{__('new record')}} </a>
                            @endcan
                        </div>
                        <div class="col-6">
                            @can('tipos.formImportExcel')
                            <a title="{{__('add tipos')}}" href="{{route('tipos.formImportExcel')}}" class="btn btn-primary"><i class="fa fa-download" aria-hidden="true"></i> </a>
                            @endcan
                            @can('tipos.formImportExcelCaracteristicas')
                            <a title="{{__('add Caracteristicas a tipo')}}" href="{{route('tipos.formImportExcelCaracteristicas')}}" class="btn btn-warning"><i class="fa fa-download" aria-hidden="true"></i> </a>
                            @endcan
                        </div>
                    </div>
                    <table  id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                               <th width="15%" class="text-capitalize">{{__('tipo de equipo')}}</th>
                               <th width="30%" class="text-capitalize">{{__('caracteristicas')}}</th>
                               <th width="50%" class="text-capitalize">{{__('protocolos')}}</th>

                               <th width="5%" class="text-center text-capitalize">{{__('actions')}} </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tipos as $tipo )
                             <tr>
                                <td scope="row" class="text-capitalize">{{$tipo->name}} </td>
                                <td scope="row" class="text-capitalize">
                                    @foreach ($tipo->tipocs as $c)
                                        {{$c->name}}<hr class="m-0">
                                     @endforeach
                                </td>
                                <td scope="row" class="text-capitalize">
                                    @foreach ($tipo->protocolos as $key=>$c)
                                   {{$key+1}}.- {{$c->tipo_text}}   {{$c->tarea}}<hr class="m-0">
                                     @endforeach
                                </td>
                                <td class="text-center">
                                    @can('tipos.assign')
                                        <a href="{{route('tipos.assign',$tipo->id)}}"
                                                class="btn btn-outline-primary text-capitalize mb-1" data-toggle="tooltip"
                                                data-placement="top" title="{{__('add characteristic')}} ">
                                                <i class="fa fa-folder-plus" aria-hidden="true"></i>
                                            </a>
                                            @endcan
                                    @can('tipos.edit')
                                    <a href="{{route('tipos.edit',$tipo->id)}}"
                                        class="btn btn-outline-success text-capitalize mb-1" data-toggle="tooltip"
                                        data-placement="top" title="{{__('edit record')}} ">
                                        <i class="fa fa-wrench" aria-hidden="true"></i>
                                    </a>
                                    @endcan
                                    @can('tipos.destroy')
                                    <a class="btn btn-outline-danger text-capitalize mb-1" href="#" onclick="event.preventDefault();
                                    document.getElementById({{$tipo->id}}).submit();" data-toggle="tooltip"
                                        data-placement="top" title="{{__('delete record')}} ">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{route('protocolos.index')}}"
                                        class="btn btn-outline-success text-capitalize mb-1" data-toggle="tooltip"
                                        data-placement="top" title="{{__('add protocols')}} ">
                                        <i class="fa fa-charging-station" aria-hidden="true"></i>
                                    </a>
                                    <form action="{{route('tipos.destroy',[$tipo->id])}} " method="post"  id="{{$tipo->id}}">
                                    @csrf
                                    @method('delete')
                                    </form>
                                    @endcan
                                    @can('tipocaracteristicas.index')
                                    <a href="{{route('tipocaracteristicas.index',$tipo->id)}}"
                                        class="btn btn-outline-info text-capitalize mb-1" data-toggle="tooltip"
                                        data-placement="top" title="{{__('add caracteristicas')}} ">
                                        <i class="fa fa-charging-station" aria-hidden="true"></i>
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

       "columnDefs": [{ "targets": [ 3 ], "orderable": false }],
        });

        $('label').addClass('form-inline');
        $('select, input[type="search"]').addClass('form-control input-sm');
        $('.dataTables_length').addClass('bs-select');
} );




</script>
@endsection

