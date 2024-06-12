@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-dark d-flex">
                        <div class="alert alert-primary mr-1 w-75" role="alert">
                            <em>control de tareas : {{$plan->name}}</em>
                            <hr>
                            equipo: {{$equipo->name}}
                        </div>
                        <div class="alert alert-secondary mr-1 w-25" role="alert">
                            <h5>total tareas: {{$equipo->tareas_de_equipo()->count()}}</h5>
                            <hr>
                            <h5>ubicacion: {{$equipo->ubicacion}}</h5>
                        </div>
                    </h4>
                </div>
                <div class="card-body">
                <form action="{{route('plans.recursosStore',$equipo->id)}}" method="POST">
                    @method('PUT')
                    @csrf
                        <div class="row">
                        <input type="hidden" name="cantidad" value="{{$costos->count()}}">
                        <input type="hidden" name="tarea" value="{{$task->id}}">
                        @foreach ($costos as $c)
                        <div class="form-group col-12 col-md-3">
                        <label for="{{$c->costo_tipo.'-'.$c->costo_id}}">{{$c->name}}</label>
                        <input type="text" class="form-control" name="recursos[{{$c->costo_tipo}}][{{$c->costo_id}}]" id="{{$c->costo_tipo.'-'.$c->costo_id}}" aria-describedby="helpId" value="{{$c->cantidad}}">
                          <small id="helpId" class="form-text text-muted">Ingrese Cantidad</small>
                        </div>
                        @endforeach
                    </div>
                    <div class="form-group col-12">
                        <button class="btn btn-success text-capitalize">{{__('save')}}</button>
                      <a href="{{route('plans.definicion',[$plan->id,$equipo->id])}}" class="btn btn-info mt-2 mb-2 text-capitalize">{{__('back')}} </a>
                      </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
