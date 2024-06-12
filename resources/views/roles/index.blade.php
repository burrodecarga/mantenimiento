@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-7 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="display-6 text-center mt-2 p-0 text-capitalize">{{__('list of').' '.__($title)}} </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <a href="{{route('roles.create')}}"
                                class="btn btn-outline-primary mb-2 float-left text-capitalize">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                {{__('new record')}}
                            </a>
                        </div>
                    </div>
                        @include('partials.success')
                        <table class="table" id="roles">
                            <thead>
                                <tr>
                                    <th width="70%">Rol</th>
                                    <th width="30%" class="text-center">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role )
                                <tr>
                                    <td scope="row" class="text-capitalize">{{$role->name}} </td>
                                    <td>
                                        <a href="{{route('roles.show',$role->id)}}"
                                            class="btn btn-outline-primary text-capitalize" data-toggle="tooltip"
                                            data-placement="top" title="{{__('show record')}} ">

                                            <i class="fa fa-list" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{route('roles.edit',$role->id)}}"
                                            class="btn btn-outline-success text-capitalize" data-toggle="tooltip"
                                            data-placement="top" title="{{__('edit record')}} ">

                                            <i class="fa fa-wrench" aria-hidden="true"></i>
                                        </a>

                                        <a class="btn btn-outline-danger text-capitalize" href="#" onclick="event.preventDefault();
                                                     document.getElementById('delete-form').submit();"
                                            data-toggle="tooltip" data-placement="top" title="{{__('delete record')}} ">

                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>

                                        <form id="delete-form" action="{{route('roles.destroy',$role->id)}}"
                                            method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
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
                    "targets": [1],
                    "orderable": false
                }],

            });

            $('label').addClass('form-inline');
            $('select, input[type="search"]').addClass('form-control input-sm');
            $('.dataTables_length').addClass('bs-select');
        });

    </script>
    @endsection
