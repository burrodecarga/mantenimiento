@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-dark text-center mt-2 p-0 text-uppercase ">{{__('list of').' '.__($title)}} </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            @can('sistemas.create')
                            <a href="{{route('sistemas.create')}} " class="btn btn-primary float-left"
                                title="{{__('add register')}} "><i class="fa fa-plus-circle" aria-hidden="true"></i>
                                {{__('new record')}} </a>
                            @endcan
                            @can('sistemas.formImportExcel')
                            <a href="{{route('sistemas.formImportExcel')}}" class="btn btn-primary float-right"><i
                                    class="fa fa-download" aria-hidden="true"></i> </a>
                            @endcan
                        </div>
                    </div>
                    <div class="card-body">
                        @include('partials.success')

                        <table id="sistemas" class="table">
                            <thead>
                                <tr>
                                    <th width="30%" class="text-capitalize">{{__('sistema')}}</th>
                                    <th width="50%" class="text-capitalize">{{__('description')}}</th>
                                    <th width="20%" class="text-center text-capitalize">{{__('actions')}} </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sistemas as $sistema )
                                <tr>
                                    <td scope="row" class="text-capitalize">{{$sistema->name}} </td>

                                    <td scope="row" class="text-capitalize">{{$sistema->description}} </td>

                                    <td>
                                        @can('sistemas.show')
                                        <a href="{{route('sistemas.show',$sistema->id)}} "
                                            class="btn btn-outline-primary text-capitalize" data-toggle="tooltip"
                                            data-placement="top" title="{{__('view sistema')}} ">
                                            <i class="fa fa-list" aria-hidden="true"></i>
                                        </a>
                                        @endcan @can('sistemas.edit')
                                        <a href="{{route('sistemas.edit',$sistema->id)}}"
                                            class="btn btn-outline-success text-capitalize" data-toggle="tooltip"
                                            data-placement="top" title="{{__('edit record')}} ">
                                            <i class="fa fa-wrench" aria-hidden="true"></i>
                                        </a>@endcan
                                        @can('sistemas.destroy')
                                        <a class="btn btn-outline-danger text-capitalize" href="#" onclick="event.preventDefault();
                                                     document.getElementById('delete-form').submit();"
                                            data-toggle="tooltip" data-placement="top" title="{{__('delete record')}} ">

                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                        <form id="delete-form" action="{{route('sistemas.destroy',$sistema->id)}}"
                                            method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        @endcan
                                        @can('subsistemas.create')
                                        <a href="{{route('subsistemas.create')}}"
                                            class="btn btn-outline-primary text-capitalize" data-toggle="tooltip"
                                            data-placement="top" title="{{__('add subsistema')}} ">

                                            <i class="fab fa-hubspot" aria-hidden="true"></i>
                                        </a>@endcan
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
        document.addEventListener('DOMContentLoaded', function () {
            $(() => {
                $(function () {
                    $('[data-toggle="tooltip"]').tooltip()
                });
            });


            table = $('#sistemas').DataTable({
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
