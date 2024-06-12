@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mx-auto">
            <div class="col-12 mb-2">
                    <form class="form-inline my-2 my-lg-0 float-right">
                        @csrf @method('post')
                        <input class="form-control mr-sm-2" type="search" name="search" placeholder="{{__('Search')}}" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">{{__('Search')}} </button>
                    </form>
            </div>
        <div class="col-md-4 bg-white border-1 shadow mx-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-capitalize font-weigth-bold">{{__('parametro')}}</th>
                        <th class="text-capitalize font-weigth-bold">{{__('assign')}} </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($parametros as $parametro )
                       <tr>
                        <td scope="row">{{$parametro->name}}</td>
                        <td scope="row"><a href="#"><i class="fa fa-arrow-alt-circle-right text-success" aria-hidden="true"></i> </a></td>

                     </tr>
                    @endforeach
                </tbody>

            </table>
             <tfoot class="cxy mx-auto">
              {{ $parametros->render()}}
            </tfoot>





        </div>
        <div class="col-md-3 bg-white border-1 shadow mx-auto">
           <div class="card my-3 p-2">
               <div class="card-title text-center font-weight-bold text-capitalize">{{__('equipo')}} </div>
               <div class="card-body text-center">
                   <strong>{{$equipo->name}}</strong><hr>
                   <strong>{{$equipo->tipo}}</strong><hr>
                   <strong>{{__('caracteristicas')}} : @if(!is_null($assigns)){{count($assigns)}}@else 0 @endif</strong><hr>
                </div>
               <a href="{{route('equipos.index')}}" class="btn btn-info mt-2 mb-2 text-capitalize">{{__('back')}} </a>
               <hr>
               <a href="{{route('equipos.assignTipo',[$equipo->id,$equipo->tipo_id])}} " class="btn btn-danger mt-2 mb-2 text-capitalize">{{__('Asignar por Tipo de Equipo')}} </a>


           </div>
        </div>
        <div class="col-md-4 bg-white border-1 shadow mx-auto">
                <div class="card my-3 p-2">
                        <div class="card-body text-center">
                            <p class="m-0 text-center font-weight-bold">Caracteristicas del Equipo</p>
                         </div>
                         <table class="table">
                                <thead>
                                    <tr>
                                        <th>{{__('eliminar')}} </th>
                                        <th>{{__('caracteristica')}}</th>
                                    </tr>
                                </thead>
                                <tbody>


                                </tbody>
                            </table>
                     </div>
        </div>
    </div>
</div>

@endsection
