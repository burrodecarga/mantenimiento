@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="display-6 text-center mt-2 p-0 text-uppercase ">{{__('zone assignment')}} </h5>
                </div>
                <div class="card-body">
                    @include('partials.success')
                    <table aria-colspan="2" id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                               <th width="15%" class="text-capitalize">{{__('user')}}</th>
                               <th width="20%" class="text-capitalize">{{__('profession')}}</th>
                               <th width="15%" class="text-capitalize">{{__('rol')}}</th>
                               <th width="10%" class="text-capitalize">{{__('zona')}}</th>
                                <th width="10%" class="text-center text-capitalize">{{__('actions')}} </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user )
                            <tr>
                                 <td scope="row" class="text-capitalize">
                                    {{$user->name}}
                                </td>
                                <td scope="row" class="text-capitalize">
                                  @if(is_null($user->profile)){{$profession='No asignada'}} @else {{$profesion=$user->profile->profession}} @endif
                                </td>
                                <td scope="row" class="text-capitalize">{{roles($user->getRoleNames())}}</td>
                                <td scope="row" class="text-capitalize">
                                    @if(is_null($user->zona_id)){{'No asignada'}} @else {{$user->zona}} @endif
                                </td>
                                <td class="text-center">
                                    @can('userzonas.edit')
                                    <a href="{{route('userzonas.edit',$user->id)}}"
                                        class="btn btn-outline-success text-capitalize" data-toggle="tooltip"
                                        data-placement="top" title="{{__('assing zone')}} ">
                                        <i class="fa fa-thumbtack" aria-hidden="true"></i>
                                    </a>
                                    @endcan
                                    @can('userzonas.show')
                                    <a href="{{route('userzonas.show',$user->id)}}"
                                        class="btn btn-outline-primary text-capitalize" data-toggle="tooltip"
                                        data-placement="top" title="{{__('equipments of zone')}} ">
                                        <i class="fa fa-compass" aria-hidden="true"></i>
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

