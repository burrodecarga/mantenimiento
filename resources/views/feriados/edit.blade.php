@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-6 mx-auto">
            <h4><strong class="text-capitalize">{{__('feriado')}}</strong>{{' : '.__('new record')}}</h4>
            {{-- @include('partials.error') --}}

            <form class="bg-white shadow rounded py-3 px-3" action="{{route('feriados.update',$feriado->id)}} " method="POST">
               @method('PUT')
                @include('feriados.partials.form')
            </form>
        </div>
    </div>
</div>
@endsection
