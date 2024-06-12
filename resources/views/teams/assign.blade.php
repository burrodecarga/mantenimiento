@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row mx-auto p-2 border rounded shadow-sm cxy bged">
        <div class="col-md-4 bg-white border-1 shadow mx-auto rounded p-3">
            <div class="card">
                <div class="card-header">
                    Personal
                </div>
                <div class="card-body">
                    <table class="table" id="team">
                        <thead>
                            <tr>
                                <th class="text-capitalize font-weigth-bold">{{__('name')}}</th>
                                <th class="text-capitalize font-weigth-bold">{{__('assign')}} </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user )
                            <tr>
                                <td scope="row">{{$user->name}}</td>
                                <td scope="row">
                                    @can('teams.team')
                                    <a href="{{route('teams.team',[$user->id,$team->id])}} "><i
                                            class="fa fa-arrow-alt-circle-right text-success" aria-hidden="true"></i>
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
        <div class="col-md-3 bg-white border-1 shadow mx-auto rounded p-3">
            <div class="card my-3 p-2">
                <div class="card-title text-center font-weight-bold text-capitalize">{{__('team of work')}} </div>
                <div class="card-body text-center">
                    <strong>{{$team->specialty}}</strong>
                    <hr>
                    <strong>{{$team->name}}</strong>
                    <hr>
                    <strong>{{__('members')}} : {{count($assigns)}}</strong>
                    <hr>
                </div>
                <a href="{{route('teams.index')}}" class="btn btn-info mt-2 mb-2 text-capitalize">{{__('back')}} </a>
            </div>
        </div>
        <div class="col-md-4 bg-white border-1 shadow mx-auto rounded p-3">
            <div class="card my-3 p-2">
                <div class="card-body text-center">
                    <strong>{{$team->specialty}}</strong>
                    <hr class="m-0">
                    <strong>{{$team->name}}</strong>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>{{__('no assign')}} </th>
                            <th>{{__('Name')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($assigns as $user )
                        <tr>
                            <td scope="row" class="text-center">
                                @can('teams.noTeam')
                                <a href="{{route('teams.noTeam',[$user->id,$team->id])}} "><i
                                        class="fa fa-arrow-alt-circle-left text-danger" aria-hidden="true"></i>
                                </a>
                                @endcan
                            </td>
                            <td scope="row">{{$user->name}}</td>
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


        table = $('#team').DataTable({
            "sPaginationType": "bootstrap",
            "pagingType": "full_numbers",
            "language": {
                "info": "_PAGE_/_PAGES_,de:_TOTAL_",
                "search": " ",
                "paginate": {
                    "next": " ",
                    "previous": "",
                    "last": " ",
                    "first": " ",
                },
                "lengthMenu": "<select class='custom-select custom-select-sm'>" +
                    "<option value='5'>5</option>" +
                    "<option value='10'>10</option>" +
                    "<option value='15'>15</option>" +
                    "<option value='20'>20</option>" +
                    "<option value='25'>25</option>" +
                    "<option value='50'>50</option>" +
                    "<option value='100'>100</option>" +
                    "<option value='-1'>Todos</option>" +
                    "</select>",
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
