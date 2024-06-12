@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="display-6 text-center mt-2 p-0 text-capitalize">{{__('teams of work')}} </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            @can('teams.create')
                            <a href="{{route('teams.create')}} " class="btn btn-primary my-2 float-left"><i
                                    class="fa fa-plus-circle" aria-hidden="true"></i> {{__('new record')}} </a>

                            @endcan
                        </div>
                    </div>
                    <div class="card-body">
                        @include('partials.success')
                        <table id="sistemas" class="table">
                            <thead>
                                <tr>
                                    <th width="20%" class="text-capitalize">{{__('team of work')}}</th>
                                    <th width="25%">{{__('kind of work')}}</th>
                                    <th width="20%">{{__('functions')}}</th>
                                    <th width="20%">{{__('members')}}</th>
                                    <th width="15%" class="text-center text-capitalize">{{__('actions')}} </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teams as $team )
                                <tr>
                                    <td scope="row" class="text-capitalize">{{$team->name}}
                                        <hr>
                                        {{$team->responsable}} </td>
                                    <td>{{$team->kind}}
                                    </td>
                                    <td>{{$team->description}}</td>
                                    <td>
                                        @foreach ($team->users as $item)
                                        <a href="{{route('teams.responsable',[$item->id,$team->id])}}"
                                            title="asignar como jefe de equipo">{{$item->name}}</a>
                                        <hr class="m-0">
                                        @endforeach
                                    </td>

                                    <td>
                                        @can('teams.assign')
                                        <a href="{{route('teams.assign',$team->id)}}"
                                            class="btn btn-outline-primary text-capitalize" data-toggle="tooltip"
                                            data-placement="top" title="{{__('make team')}} ">
                                            <i class="fa fa-list" aria-hidden="true"></i>
                                        </a>
                                        @endcan
                                        @can('teams.edit')
                                        <a href="{{route('teams.edit',$team->id)}}"
                                            class="btn btn-outline-success text-capitalize" data-toggle="tooltip"
                                            data-placement="top" title="{{__('edit record')}} ">
                                            <i class="fa fa-wrench" aria-hidden="true"></i>
                                        </a>
                                        @endcan
                                        @can('teams.destroy')
                                        <a class="btn btn-outline-danger text-capitalize" href="#" onclick="event.preventDefault();
                                                     document.getElementById('delete-form').submit();"
                                            data-toggle="tooltip" data-placement="top" title="{{__('delete record')}} ">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                        <form id="delete-form" action="{{route('teams.destroy',$team->id)}}"
                                            method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>@endcan
                                    </td>
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
