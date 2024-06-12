@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mx-auto">
            <h4><strong class="text-capitalize">{{__('Plan de Mantenimiento')}}</strong>{{' : '.__('Selección de Equipos')}}</h4>
             @include('partials.error')
            <form class="bg-white shadow rounded py-3 px-3" action="{{route('plans.addStore',$plan->id)}} " method="POST">
                @csrf
                @method('PUT')

                @include('plans.partials.box')
            </form>
        </div>
    </div>
</div>
@endsection
