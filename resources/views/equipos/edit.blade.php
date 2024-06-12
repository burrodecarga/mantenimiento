@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-8 mx-auto">
            <h4><strong class="text-capitalize">{{__($title)}}</strong>{{' : '.__('edit record')}}</h4>
            {{-- @include('partials.error') --}}
            <form class="bg-white shadow rounded py-3 px-3" action="{{route('equipos.update',$equipo->id)}} " method="POST">
                @method('PUT')
                @include('equipos.partials.formEditNew')
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{asset('js/mantenimiento.js')}} "></script>
@endsection
