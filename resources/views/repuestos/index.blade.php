@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="display-6 text-center mt-2 p-0 text-uppercase ">{{__('spare parts')}} </h5>
                </div>
                <div class="card-body">
                    @include('partials.success')
                    <div class="col  d-flex justify-content-between  align-items-center">
                        <span>
                            @can('repuestos.create')
                            <a href="{{route('repuestos.create')}} " class="btn btn-primary my-2 float-left"
                                title="{{__('add register')}} "><i class="fa fa-plus-circle" aria-hidden="true"></i>
                                {{__('new record')}} </a>@endcan
                        </span>
                        <span>
                            @can('repuestos.formImportExcel')
                            <a href="{{route('repuestos.formImportExcel')}}" class="btn btn-primary"><i
                                    class="fa fa-download" aria-hidden="true"></i> </a>
                            @endcan
                        </span>

                    </div>
                    <table aria-colspan="2" id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th width="20%" class="text-capitalize">{{__('repuesto')}}</th>
                                <th width="10%" class="text-capitalize">{{__('precio')}}</th>
                                <th width="10%" class="text-capitalize">{{__('existencia')}}</th>
                                <th width="20%" class="text-capitalize">{{__('proveedor')}}</th>
                                <th width="30%" class="text-capitalize">{{__('description')}}</th>
                                <th width="10%" class="text-center text-capitalize">{{__('actions')}} </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($repuestos as $repuesto )
                            <tr>

                                <td scope="row" class="text-capitalize">{{$repuesto->name}}</td>
                                <td scope="row" class="text-capitalize text-right">
                                    {{number_format($repuesto->precio, 2)}}</td>
                                <td scope="row" class="text-capitalize text-right">
                                    {{number_format($repuesto->existencia, 2)}}</td>
                                <td scope="row" class="text-capitalize">{{$repuesto->proveedor}}
                                    <hr>{{$repuesto->marca}}</td>
                                <td scope="row" class="text-capitalize">{{$repuesto->description}} </td>
                                <td class="text-center">
                                    @can('repuestos.edit')
                                    <a href="{{route('repuestos.edit',$repuesto->id)}}"
                                        class="btn btn-outline-success text-capitalize" data-toggle="tooltip"
                                        data-placement="top" title="{{__('edit record')}} ">

                                        <i class="fa fa-wrench" aria-hidden="true"></i>
                                    </a>
                                    @endcan
                                    @can('repuestos.destroy')
                                    <a class="btn btn-outline-danger text-capitalize" href="#" onclick="event.preventDefault();
                                    document.getElementById({{$repuesto->id}}).submit();" data-toggle="tooltip"
                                        data-placement="top" title="{{__('delete record')}} ">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                    <form action="{{route('repuestos.destroy',[$repuesto->id])}} " method="post"
                                        id="{{$repuesto->id}}">
                                        @csrf
                                        @method('delete')
                                    </form>
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
