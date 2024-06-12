@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="display-6 text-center mt-2 p-0 text-capitalize">{{__('list of').' '.__($title)}} </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            @can('users.create')
                            <a href="{{route('users.create')}} " class="btn btn-primary my-2 float-left"><i
                                    class="fa fa-plus-circle" aria-hidden="true"></i> {{__('new record')}} </a>
                       @endcan
                    </div>
                    </div>
                    @include('partials.success')
                 <table class="table" id="roles">
                        <thead>
                            <tr>
                                <th width="30%" class="text-capitalize">{{__('users')}}</th>
                                <th width="30%" class="text-capitalize">{{__('email')}}</th>
                                <th width="20%">{{__('role')}}</th>
                                <th width="20%" class="text-center text-capitalize">{{__('actions')}} </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user )
                            <tr>
                                <td scope="row" class="text-capitalize">{{$user->name}} </td>
                                <td scope="row" class="text-capitalize">{{$user->email}} </td>
                            <td>{{roles($user->getRoleNames())}}<hr>{{$user->area}}</td>
                                <td>
                                    @can('users.show')
                                    <a href="{{route('users.show',$user->id)}}"
                                        class="btn btn-outline-primary text-capitalize" data-toggle="tooltip"
                                        data-placement="top" title="{{__('show record')}} ">
                                        <i class="fa fa-list" aria-hidden="true"></i>
                                    </a>
                                    @endcan
                                    @can('users.edit')
                                    <a href="{{route('users.edit',$user->id)}}"
                                        class="btn btn-outline-success text-capitalize" data-toggle="tooltip"
                                        data-placement="top" title="{{__('edit record')}} ">
                                        <i class="fa fa-wrench" aria-hidden="true"></i>
                                    </a>@endcan
                                    @can('users.destroy')
                                    <a class="btn btn-outline-danger text-capitalize" href="#" onclick="event.preventDefault();
                                                     document.getElementById('delete-form').submit();"
                                        data-toggle="tooltip" data-placement="top" title="{{__('delete record')}} ">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                    <form id="delete-form" action="{{route('users.destroy',$user->id)}}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    @endcan
                                    @can('profiles.edit')
                                    <a href="{{route('profiles.edit',$user->id)}}"
                                        class="btn btn-outline-primary text-capitalize" data-toggle="tooltip"
                                        data-placement="top" title="{{__('add data')}} ">
                                        <i class="fa fa-address-card" aria-hidden="true"></i>
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
                "targets": [3],
                "orderable": false
            }],

        });

        $('label').addClass('form-inline');
        $('select, input[type="search"]').addClass('form-control input-sm');
        $('.dataTables_length').addClass('bs-select');
    });

</script>
@endsection
