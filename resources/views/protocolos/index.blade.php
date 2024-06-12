@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="display-6 text-center mt-2 p-0 text-uppercase ">{{__('protocols')}} </h5>
                </div>
                <div class="card-body">
                    @include('partials.success')
                    <div class="col  d-flex justify-content-between  align-items-center">
                        <span>
                            @can('protocolos.create')
                            <a href="{{route('protocolos.create')}} " class="btn btn-primary my-2 float-left"
                            title="{{__('add register')}} "><i class="fa fa-plus-circle" aria-hidden="true"></i>
                            {{__('new record')}} </a>
                            @endcan
                        </span>
                        <span>
                            @can('protocolos.formImportExcel')
                                          <a href="{{route('protocolos.formImportExcel')}}" class="btn btn-primary"><i class="fa fa-download" aria-hidden="true"></i> </a>
                        @endcan
                    </span>

                    </div>
                    <table aria-colspan="2" id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                               <th width="15%" class="text-capitalize">{{__('protocolo')}}</th>
                               <th width="25%" class="text-capitalize">{{__('tarea')}}</th>
                               <th width="45%" class="text-capitalize">{{__('description')}}</th>
                                <th width="10%" class="text-center text-capitalize">{{__('actions')}} </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($protocolos as $protocolo )
                            <tr>

                                <td scope="row" class="text-capitalize">
                                    {{$protocolo->tipo_text}}<hr>
                                    {{$protocolo->protocolo}}
                                </td>
                                <td scope="row" class="text-capitalize">
                                    {{$protocolo->tarea_tipo}}<hr>
                                    tiempo estimado: {{$protocolo->duracion}}  @if($protocolo->duracion==1) hora @else horas @endif<hr>
                                    frecuencia de: {{$protocolo->frecuencia}}@if($protocolo->frecuencia==1) día @else días @endif<hr>
                                    {{$protocolo->tarea}}<hr>
                             </td>

                                 <td scope="row" class="text-capitalize">{{$protocolo->description}}<hr>
                                    {{$protocolo->seguridad}}
                                    <hr>
                                    {{$protocolo->condiciones}}
                                </td>
                                <td class="text-center">
                                    @can('protocolos.edit')
                                    <a href="{{route('protocolos.edit',$protocolo->id)}}"
                                        class="btn btn-outline-success text-capitalize" data-toggle="tooltip"
                                        data-placement="top" title="{{__('edit record')}} ">
                                        <i class="fa fa-wrench" aria-hidden="true"></i>
                                    </a>
                                    @endcan
                                    @can('protocolos.destroy')
                                    <a class="btn btn-outline-danger text-capitalize" href="#" onclick="event.preventDefault();
                                    document.getElementById({{$protocolo->id}}).submit();" data-toggle="tooltip"
                                        data-placement="top" title="{{__('delete record')}} ">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                    <form action="{{route('protocolos.destroy',[$protocolo->id])}} " method="post"  id="{{$protocolo->id}}">
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

       "columnDefs": [{ "targets": [ 3 ], "orderable": false }],
        });

        $('label').addClass('form-inline');
        $('select, input[type="search"]').addClass('form-control input-sm');
        $('.dataTables_length').addClass('bs-select');
} );




</script>
@endsection

