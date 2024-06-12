@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="display-6 text-center mt-2 p-0 text-uppercase ">{{__('Fallas por despejar')}} </h5>
                    <h6> Responsable:<strong><em>
                        {{Auth::user()->name}}
                    </em></strong></h6>
                </div>
                <div class="card-body">
                    @include('partials.success')

                    <table aria-colspan="2" id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                               <th width="85%" class="text-capitalize">{{__('detalles')}}</th>
                               <th width="15%" class="text-center text-capitalize">{{__('actions')}} </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($fallas as $falla )
                            <tr>
                                <td scope="row" class="text-capitalize">
                                    <div class="card text-left">
                                      <div class="card-body">
                                        <h4 class="card-title"> {{$falla->equipo->name}}</h4>
                                        <p class="card-text">
                                        {{$falla->falla}}
                                  <hr>
                                  {{'reportada: '.$falla->created_at->diffForHumans()}}
                                  <hr>
                                  {{'condición: '.$falla->condicion}}
                                  <hr>
                                   {{$falla->falla}}
                                  </p>
                                      </div>
                                    </div>

                                </td>
                                <td class="text-center">
                                    @can('teamfallas.report')
                                    <a href="{{route('teamfallas.report',$falla->id)}}"
                                        class="btn btn-outline-danger text-capitalize mb-1" data-toggle="tooltip"
                                        data-placement="top" title="{{__('atención de falla')}} ">
                                        <i class="fa fa-charging-station" aria-hidden="true"></i>
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

       "columnDefs": [{ "targets": [ 1 ], "orderable": false }],
        });

        $('label').addClass('form-inline');
        $('select, input[type="search"]').addClass('form-control input-sm');
        $('.dataTables_length').addClass('bs-select');
} );




</script>
@endsection

