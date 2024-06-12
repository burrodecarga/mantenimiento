@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mx-auto p-2 border rounded shadow-sm bged">
        <div class="col-md-12 bg-white border-1 shadow mx-auto mb-1">
            <div class="card my-3 p-2">
                <div class="card-title text-center font-weight-bold text-capitalize">{{__('Recursos de Falla')}} </div>
                <div class="card-body text-center">
                    <strong>{{$falla->reporte}}</strong><hr>
                    <strong>{{$falla->falla}}</strong><hr>
                    <strong>{{__('recursos')}} : </strong><hr>
                 </div>
                 <a href="{{route('teamfallas.report',$falla->id)}}" class="btn btn-primary mt-2 mb-2 text-capitalize w-25 text-center">{{__('back')}} </a>
                </div>
        </div>


        <div class="col-md-6 bg-white border-1 shadow mx-auto p-3 rounded">
            <table id="recursos" class="table">
                <thead>
                    <tr>
                        <th class="text-capitalize font-weigth-bold" style="width:70%">{{__('recurso')}}</th>
                        <th class="text-capitalize font-weigth-bold" style="width:20%">{{__('existencia')}}</th>
                        <th class="text-capitalize font-weigth-bold" style="width:10%">{{__('assign')}} </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($recursos as $recurso )
                       <tr>
                        <td scope="row">{{$recurso->name}}</td>
                        <td scope="row" class="text-right">{{numerico($recurso->existencia)}}</td>
                        <td scope="row" class="text-center"><a href="{{route('teamfallas.asignar',[$falla->id,$recurso->id,$t])}}"><i class="fa fa-arrow-alt-circle-right text-success" aria-hidden="true"></i> </a></td>
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
                         <table class="table">
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
 document.addEventListener('DOMContentLoaded', (event) =>{
    $('#recursos').DataTable({
        "columnDefs": [{ "targets": [ 2 ], "orderable": false }],
        "language": {
                "info": "Pag.  _PAGE_ de _PAGES_  páginas,  Total: _TOTAL_ ",
                "search": "",
                "paginate": {
                    "next": "Sig.",
                    "previous": "Ant.",
                    "last": "Último",
                    "first": "Primero",
                }}
    });
 });
</script>

@endsection
