<div class="tab-pane fade" id="pills-anual" role="tabpanel" aria-labelledby="pills-anual-tab">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="5%">{{__('Pos')}}</th>
                                <th width="5%">{{__('Prev')}}</th>
                                <th width="35%" class="text-capitalize">{{__('Equipo')}}</th>
                                <th width="40%">{{__('Tareas ')}}</th>
                                <th width="10%" class="text-center text-capitalize">{{__('actions')}} </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($anual as $key=>$q)
                            <tr>
                                <th width="5%">{{$q->tarea_posicion}}</th>
                                <th width="5%">{{$q->tarea_restriccion}}</th>
                                <th width="35%">{{$q->equipo_text}}</th>
                                <th width="40%">{{$q->tarea}}</th>
                                <th width="10%">
                                <form id="formulario" method="Post" action="{{route('plans.mdf',$q->id)}}">
                                    @csrf
                                    <div class="row">
                                    <input type="hidden" name="id" value="{{$q->id}}">
                                    <input type="hidden" name="pos" value="{{$q->tarea_posicion}}">
                                    <input type="hidden" name="res" value="{{$q->tarea_restriccion}}">
                                    <input type="text" name="pos_" class="form-control form-control-sm col-12 col-md-4 ml-1" value="{{$key+1}}"/>
                                    <input type="text" name="res_" class="form-control form-control-sm col-12 col-md-4 ml-1" value="0"/>
                                    <input type="submit" class="btn btn-success my-1 btn-sm" name="enviar" value="Modificar"/><br>
                                   </div>
                                      </form>
                                </th>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
