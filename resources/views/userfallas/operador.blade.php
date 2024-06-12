@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="display-6 text-center mt-2 p-0 text-uppercase ">{{__('Condición de Equipos')}}
                    </h5>
                    <h6>Responsable <strong> <em>{{$user->name}}</em></strong></h6>
                    <h6>Zona <strong> <em>{{$user->zona}}</em></strong></h6>
                </div>
                <div class="card-body">
                    @include('partials.success')

                    <table aria-colspan="2" id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th width="50%" class="text-capitalize">{{__('equipo')}}</th>
                                <th width="40%" class="text-capitalize">{{__('falla')}}</th>
                                <th width="10%" class="text-center text-capitalize">{{__('actions')}} </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($equipos as $equipo )
                            <tr>

                                <td scope="row" class="text-capitalize">
                                    {{$equipo->name}}
                                </td>
                                <td scope="row" class="text-capitalize">
                                <ul class="list-group">
                                   @foreach($equipo->fallas as $f)
                                   @if(!$f->despejada)
                                   <li class="list-group-item btn-outline-danger">{{fecha($f->reportada_fecha).' : '.$f->reporte}}</li>
                                   @endif
                                   @endforeach
                                   @if($equipo->fallas->isEmpty())
                                   <li class="list-group-item btn-outline-success">Equipo Funcionado correctamente</li>
                                   @endif
                                </ul>
                                </td>
                                <td class="text-center">
                                    @can('userfallas.create')
                                    <a href="{{route('userfallas.create',$equipo->id)}}"
                                        class="btn btn-outline-danger text-capitalize mb-1" data-toggle="tooltip"
                                        data-placement="top" title="{{__('fail report zone')}} ">
                                        <i class="fa fa-charging-station" aria-hidden="true"></i>
                                    </a>
                                    @endcan
                                    @if(!$equipo->fallas->isEmpty())
                                      @can('userfallas.show')
                                    <a href="{{route('userfallas.despeje',$equipo->id)}}"
                                        class="btn btn-outline-primary text-capitalize mb-1" data-toggle="tooltip"
                                        data-placement="top" title="{{__('despejar falla')}}"                   >
                                        <i class="fab fa-whmcs" aria-hidden="true"></i>
                                    </a>
                                   @endif
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
                "targets": [2],
                "orderable": false
            }],
        });

        $('label').addClass('form-inline');
        $('select, input[type="search"]').addClass('form-control input-sm');
        $('.dataTables_length').addClass('bs-select');


    });
function despejar(id) {
        alert(id);
    }
</script>
@endsection

