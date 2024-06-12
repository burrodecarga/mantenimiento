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
                        @include('partials.success')
                        <div class="row cxy">
                            <div class="col-6">
                                @can('equipos.create')
                                <a href="{{route('equipos.create')}} " class="btn btn-primary my-2 float-left" title="{{__('add register')}} "><i class="fa fa-plus-circle" aria-hidden="true"></i> {{__('new record')}} </a>
                                @endcan
                            </div>
                            <div class="col-6">
                                @can('equipos.formImportExcel')
                                <a href="{{route('equipos.formImportExcel')}}" class="btn btn-primary"><i class="fa fa-download" aria-hidden="true"></i> </a>
                                @endcan
                            </div>
                        </div>



                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th width="20%" class="text-capitalize text-center">{{__('ubicación')}}</th>
                                    <th width="20%" class="text-capitalize">{{__('equipo')}}</th>
                                    <th width="20%">{{__('tipo')}}</th>
                                    <th width="25%" >{{__('description')}}</th>
                                    <th width="15%" class="text-center text-capitalize">{{__('actions')}} </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($equipos as $equipo )
                                <tr>
                                    <td scope="row" class="text-capitalize text-center">
                                        @if(!is_null($equipo->zona)){{$equipo->ubicacion}}@else Sin Zona @endif
                                        <hr>
                                        {{$equipo->sistema}} <hr>
                                        {{$equipo->subsistema}}<hr>
                                    </td>
                                    <td scope="row" class="text-capitalize">{{$equipo->name}} </td>
                                    <td scope="row" class="text-capitalize">{{$equipo->tipo}} </td>
                                    <td>{{$equipo->description}}</td>
                                    <td>
                                        @can('equipocaracteristica.show')
                                        <a href="{{route('equipocaracteristica.show',$equipo->id)}} " class="btn btn-outline-primary text-capitalize mb-1" data-toggle="tooltip" data-placement="top"
                                        title="{{__('equipment show')}} ">
                                            <i class="fa fa-list" aria-hidden="true"></i>
                                        </a>
                                        @endcan
                                        @can('equipos.edit')
                                        <a href="{{route('equipos.edit',$equipo->id)}}" class="btn btn-outline-success text-capitalize mb-1" data-toggle="tooltip" data-placement="top"
                                        title="{{__('edit record')}} ">
                                            <i class="fa fa-wrench" aria-hidden="true"></i>
                                        </a>
                                        @endcan

                                      @can('equipos.destroy')
                                        <a class="btn btn-outline-danger text-capitalize mb-1" href="#" onclick="event.preventDefault();
                                    document.getElementById({{$equipo->id}}).submit();" data-toggle="tooltip"
                                        data-placement="top" title="{{__('delete record')}} ">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                    <form action="{{route('equipos.destroy',[$equipo->id])}} " method="post"  id="{{$equipo->id}}">
                                    @csrf
                                    @method('delete')
                                    </form>
                                    @endcan

                                    @can('equipocaracteristica.index')
                                    <a href="{{route('equipocaracteristica.index',$equipo->id)}}" class="btn btn-outline-dark text-capitalize my-1" data-toggle="tooltip" data-placement="top"
                                    title="{{__('add details')}} ">
                                        <i class="fa fa-folder-plus" aria-hidden="true"></i>
                                    </a>
                                    @endcan
                                    @can('equipocaracteristica.clone')
                                    <a href="{{route('equipocaracteristica.clone',$equipo->id)}}" class="btn btn-outline-info text-capitalize my-1" data-toggle="tooltip" data-placement="top"
                                        title="{{__('clone record')}} ">
                                            <i class="fa fa-copy" aria-hidden="true"></i>
                                        </a>
                                    @endcan
                                    @can('equipocaracteristica.imagen')
                                        <a href="{{route('equipocaracteristica.imagen',$equipo->id)}}" class="btn btn-outline-success text-capitalize my-1" data-toggle="tooltip" data-placement="top"
                                            title="{{__('add image')}} ">
                                                <i class="fa fa-image" aria-hidden="true"></i>
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
document.addEventListener('DOMContentLoaded', function() {
	$(() => {
        $(function () {
        $('[data-toggle="tooltip"]').tooltip()
        });
    });

   table = $('#example').DataTable({
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
           "columnDefs": [{ "targets": [ 4 ], "orderable": false }],

        });

        $('label').addClass('form-inline');
        $('select, input[type="search"]').addClass('form-control input-sm');
        $('.dataTables_length').addClass('bs-select');
});
</script>
@endsection
