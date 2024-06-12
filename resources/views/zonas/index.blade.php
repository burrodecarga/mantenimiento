@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="display-6 text-center mt-2 p-0 text-uppercase ">{{__('Zonas')}} </h5>
                </div>
                <div class="card-body">
                    <!-- @include('partials.success') -->
                        <div class="col">
                            @can('zonas.create')
                            <a href="{{route('zonas.create')}} " class="btn btn-primary my-2 float-left"
                                title="{{__('add register')}} "><i class="fa fa-plus-circle" aria-hidden="true"></i>
                                {{__('new record')}} </a>
                            @endcan
                        </div>
                    @include('partials.success')
                    <table class="table" id="zonas">
                        <thead>
                            <tr>
                                <th width="10%" class="d-none">{{__('ID')}}</th>
                                <th width="70%" class="text-capitalize">{{__('zona')}}</th>
                                <th width="20%" class="text-center text-capitalize">{{__('actions')}} </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($zonas as $zona )
                            <tr>
                                <td scope="row" class="text-capitalize d-none">{{$zona->id}} </td>
                                <td scope="row" class="text-capitalize">{{($zona->name)}} </td>
                                <td>
                                    @can('zonas.edit')
                                    <a href="{{route('zonas.edit',$zona->id)}}"
                                        class="btn btn-outline-success text-capitalize" data-toggle="tooltip"
                                        data-placement="top" title="{{__('edit record')}} ">
                                        <i class="fa fa-wrench" aria-hidden="true"></i>
                                    </a>
                                    @endcan
                                    @can('zonas.destroy')
                                        <a class="btn btn-outline-danger text-capitalize" href="#" onclick="event.preventDefault();
                                    document.getElementById({{$zona->id}}).submit();" data-toggle="tooltip"
                                        data-placement="top" title="{{__('delete record')}} ">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                    <form action="{{route('zonas.destroy',[$zona->id])}} " method="post"  id="{{$zona->id}}">
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
    @endsection
    @section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            $(() => {
                $(function () {
                    $('[data-toggle="tooltip"]').tooltip()
                });
            });


            table = $('#zonas').DataTable({
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
