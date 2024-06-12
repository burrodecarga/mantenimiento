@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-10 mx-auto">
            <h4><strong class="text-capitalize">{{__('Plan de Mantenimiento')}}</strong>{{' : '.__('agregar recursos')}}
            </h4>
            <h4><strong class="text-capitalize">{{__('Tarea')}}</strong>{{' : '.$task->tarea}}
                    </h4>
            {{-- @include('partials.error') --}}
            <form class="bg-white shadow rounded py-3 px-3" action="{{route('plans.storeAjustes')}} " method="POST">
                @method('POST')
                @csrf
                <div class="row">
                    <input type="hidden" name="equipo_id" value="{{$task->equipo_id}}">
                    <input type="hidden" name="plan_id" value="{{$task->plan_id}}">
                    <input type="hidden" name="task_id" value="{{$task->id}}">

                    <select title="seleccione herramientas" name="herramientas[]" id="herramientas" class="selectpicker col-12 col-md-6" multiple
                        data-live-search="true">
                        @foreach ($herramientas as $h)
                        <option value="{{$h->id}}">{{$h->name}}</option>
                        @endforeach
                    </select>

                    <select title="seleccione insumos" name="insumos[]" id="insumos" class="selectpicker col-12 col-md-6" multiple data-live-search="true">
                        @foreach ($insumos as $h)
                        <option value="{{$h->id}}">{{$h->name}}</option>
                        @endforeach
                    </select>

                   <select title="seleccione repuestos" name="repuestos[]" id="repuestos" class="selectpicker col-12 col-md-6 my-2" multiple data-live-search="true">
                    @foreach ($repuestos as $h)
                    <option value="{{$h->id}}">{{$h->name}}</option>
                    @endforeach
                </select>

                <select title="selecciones servicios" name="servicios[]" id="servicios" class="selectpicker col-12 col-md-6 my-2" multiple data-live-search="true">
                    @foreach ($servicios as $h)
                    <option value="{{$h->id}}">{{$h->name}}</option>
                    @endforeach
                </select>

                <select title="selecciones equipo de trabajo" name="team_id" id="team" class="selectpicker col-12 col-md-6 my-2"  data-live-search="true">
                    @foreach ($teams as $h)
                    <option value="{{$h->id}}">{{$h->name}}</option>
                    @endforeach
                </select>


                <div class="form-group">
                   <button class="btn btn-success text-capitalize">{{__('save')}}</button>
                <a href="{{route('plans.definicion',[$task->plan_id,$task->equipo_id])}}" class="btn btn-info mt-2 mb-2 text-capitalize">{{__('back')}} </a>

                </div>


            </form>
        </div>
    </div>
</div>
@endsection
