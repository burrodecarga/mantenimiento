@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-6 mx-auto">
            <h4 class="texth4"><strong class="text-capitalize">{{__('Modificar Caracteristica')}}</strong>{{' : '.__('')}}</h4>
            {{-- @include('partials.error') --}}
            <form class="bg-white shadow rounded py-3 px-3" action="{{route('equipocaracteristica.update',[$equipo->id,$caracteristica->id])}} " method="POST">
                @method('put')
                @include('equipocaracteristica.partials.form')
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{asset('js/mantenimiento.js')}} "></script>
@endsection
