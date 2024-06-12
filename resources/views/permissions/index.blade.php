@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-md-10 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="display-6 text-center mt-2 p-0 text-capitalize">{{__('list of').' '.__($title)}} </h5>
            </div>
            <div class="card-body">
                    <div>
                        @can('permissions.create')
                        <a href="{{route('permissions.create')}}"
                            class="btn btn-outline-primary float-left text-capitalize mb-2">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            {{__('new record')}}</a>
                        @endcan
                    </div>
                    @include('partials.success')
                    <table class="table" id="roles">
                        <thead>
                            <tr>
                                <th width="40%" class="text-capitalize">{{__('permissions')}} </th>
                                <th width="40%" class="text-capitalize">{{__('ruta')}} </th>
                                <th width="20%" class="text-center text-capitalize">{{__('actions')}} </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission )
                            <tr>
                                <td scope="row" class="text-capitalize">{{$permission->permiso}}
                                <td scope="row" class="text-capitalize">{{$permission->name}} </td>
                                <td class="cxy">
                                    <a href="{{route('permissions.show',$permission->id)}}"
                                        class="btn btn-outline-primary text-capitalize" data-toggle="tooltip"
                                        data-placement="top" title="{{__('show record')}} ">

                                        <i class="fa fa-list" aria-hidden="true"></i>
                                    </a>
                                    @can('permissions.edit')
                                    <a href="{{route('permissions.edit',$permission->id)}}"
                                        class="btn btn-outline-success text-capitalize" data-toggle="tooltip"
                                        data-placement="top" title="{{__('edit record')}} ">
                                        <i class="fa fa-wrench" aria-hidden="true"></i>
                                    </a>
                                    @endcan
                                    @can('permissios.destroy')
                                    <a class="btn btn-outline-danger text-capitalize" href="#" onclick="event.preventDefault();
                                                     document.getElementById('delete-form').submit();"
                                        data-toggle="tooltip" data-placement="top" title="{{__('delete record')}} ">

                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>

                                    <form id="delete-form" action="{{route('permissions.destroy',$permission->id)}}"
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


            table = $('#roles').DataTable({
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
