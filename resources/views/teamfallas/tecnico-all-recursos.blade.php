@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-10 mx-auto">
            <h4><strong class="text-capitalize">{{__('Recursos usados para despejar falla')}}</strong>
            </h4>
            <h4><strong class="text-capitalize">{{__('Falla')}}</strong>{{' : '.$falla->falla}}</h4>
            {{-- @include('partials.error') --}}
        <form class="bg-white shadow rounded p-3 m-3" action="{{route('teamfallas.storeAllRecursos',$falla->id)}}" method="POST">
                @method('POST')
                @csrf
                <div class="row">
                    <input type="hidden" name="equipo_id" value="{{$falla->equipo_id}}">
                    <input type="hidden" name="plan_id" value="{{$falla->plan_id}}">
                    <input type="hidden" name="task_id" value="{{$falla->id}}">
                    <select title="seleccione herramientas" name="herramientas[]" id="herramientas"
                    class="selectpicker col-12 col-md-6" multiple data-live-search="true">
                        @foreach ($herramientas as $h)
                        <option value="{{$h->id}}" @if($herramientas_id->contains($h->id)) selected @endif>{{$h->name}}</option>
                        @endforeach
                    </select>
                    <select title="seleccione insumos" name="insumos[]" id="insumos"
                        class="selectpicker col-12 col-md-6" multiple data-live-search="true">
                        @foreach ($insumos as $h)
                        <option value="{{$h->id}}" @if($insumos_id->contains($h->id))) selected @endif>{{$h->name}}</option>
                        @endforeach
                    </select>
                    <select title="seleccione repuestos" name="repuestos[]" id="repuestos"
                        class="selectpicker col-12 col-md-6 my-2" multiple data-live-search="true">
                        @foreach ($repuestos as $h)
                        <option value="{{$h->id}}" @if($repuestos_id->contains($h->id)) selected @endif>{{$h->name}}</option>
                        @endforeach
                    </select>
                    <select title="selecciones servicios" name="servicios[]" id="servicios"
                        class="selectpicker col-12 col-md-6 my-2" multiple data-live-search="true">
                        @foreach ($servicios as $h)
                        <option value="{{$h->id}}" @if($servicios_id->contains($h->id)) selected @endif>{{$h->name}}</option>
                        @endforeach
                    </select>
                    <div class="form-group col-12 col-md-6 my-2">
                        <button class="btn btn-success text-capitalize">{{__('save')}}</button>
                        <a href="{{URL::previous()}}" class="btn btn-info mt-2 mb-2 text-capitalize">{{__('back')}} </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
