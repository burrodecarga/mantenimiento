@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mx-auto p-2 border rounded shadow-sm bged">
        <div class="col-md-12 bg-white border-1 shadow mx-auto mb-1">
            <div class="card my-3 p-2">
                <div class="card-title text-center font-weight-bold text-capitalize m-0">{{__('Asignación de Recursos para resolver Falla')}}<hr>
                    <div class="alert alert-primary" role="alert" id="alerta">
                        <strong>Asignando Recurso</strong>
                    </div>
                </div>
              <a href="{{route('teamfallas.report',$falla->id)}}" class="btn btn-primary mt-2 mb-2 text-capitalize w-25 text-center">{{__('back')}} </a>
            </div>
        </div>


        <div class="col-md-6 bg-white border-1 shadow mx-auto p-3 rounded">
            <table id="recursos" class="table">
                <thead>
                    <tr>
                        <th class="text-capitalize font-weigth-bold d-none" style="width:70%">{{__('id')}}</th>
                        <th class="text-capitalize font-weigth-bold" style="width:70%">{{__('recurso')}}</th>
                        <th class="text-capitalize font-weigth-bold" style="width:20%">{{__('existencia')}}</th>
                        <th class="text-capitalize font-weigth-bold" style="width:10%">{{__('assign')}} </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($recursos as $recurso )
                   <tr>
                        <td class="d-none" scope="row">{{$falla->id.'-'.$recurso->id.'-'.$t}}</td>
                        <td scope="row">{{$recurso->name}}</td>
                        <td scope="row" class="text-right">{{numerico($recurso->existencia)}}</td>
                       <td scope="row" class="text-center">
                       <form id="form{{$recurso->id}}" action="{{route('teamfallas.asignarRecurso',$recurso->id)}}" class="" method="POST" >
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="falla_id" value="{{$falla->id}}">
                        <input type="hidden" name="recurso_id" value="{{$recurso->id}}">
                        <input type="hidden" name="t" value="{{$t}}">
                       <a href="#" class="btn-submit"><i class="fa fa-arrow-alt-circle-right text-success" aria-hidden="true"></i>
                       </a>
                    </form>
                          </td>
                     </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-md-6 bg-white border-1 shadow mx-auto p-2">
                <div class="card my-3 p-2">
                        <div class="card-body text-center">
                            <strong>{{$falla->falla}}</strong><hr class="m-0">
                            <strong>{{$falla->reporte}}</strong>
                         </div>
                         <table class="table" id="team">
                                <thead>
                                    <tr>
                                        <th class="text-center">{{__('(-)')}} </th>
                                        <th>{{__('Name')}}</th>
                                        <th class="text-center">{{__('cantidad')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($assigns as $recurso )
                                       <tr>
                                        <td style="width:10%" scope="row" class="text-center"><a href="{{route('teamfallas.noasignar',[$recurso->id])}} "><i class="fa fa-arrow-alt-circle-left text-danger" aria-hidden="true"></i> </a></td>
                                        <td style="width:80%" scope="row">{{$recurso->name}}</td>
                                        <td style="width:10%" scope="row" class="text-center">
                                            <a href="{{route('teamfallas.edit_recurso',[$recurso->id])}} ">
                                            {{$recurso->cantidad}}</a>
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
document.addEventListener('DOMContentLoaded', function() {
	$(() => {
        $(function () {
        $('[data-toggle="tooltip"]').tooltip()
        });
    });

   table = $('#recursos').DataTable({
       "sPaginationType": "bootstrap",
           "pagingType":"full_numbers",
           "language":{
             "info": "Pag.  _PAGE_ de _PAGES_  páginas,  Total: _TOTAL_ ",
               "search":"Buscar  ",
               "paginate":{
                   "next":"Sig.",
                   "previous":"Ant.",
                   "last":"Último",
                   "first":"Primero",
               },
               "lengthMenu":"Mostrar  <select class='custom-select custom-select-sm'>"+
                             "<option value='5'>5</option>"+
                             "<option value='10'>10</option>"+
                             "<option value='15'>15</option>"+
                             "<option value='20'>20</option>"+
                             "<option value='25'>25</option>"+
                             "<option value='50'>50</option>"+
                             "<option value='100'>100</option>"+
                             "<option value='-1'>Todos</option>"+
                             "</select> Registros",
               "loadingRecord":"Cargando....",
               "processing":"Procesando...",
               "emptyTable":"No hay Registros",
               "zeroRecords":"No hay coincidencias",
               "infoEmpty":"",
               "infoFiltered":""
           },
           "columnDefs": [{ "targets": [ 2 ], "orderable": false }],

        });

        $('label').addClass('form-inline');
        $('select, input[type="search"]').addClass('form-control input-sm');
        $('.dataTables_length').addClass('bs-select');

});
</script>
<script src="{{asset('js/recursos.js')}}"></script>

@endsection
