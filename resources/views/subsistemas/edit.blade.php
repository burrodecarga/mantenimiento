@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-6 mx-auto">
            <h4><strong class="text-capitalize">{{__($title)}}</strong>{{' : '.__('edit record')}}</h4>
            {{-- @include('partials.error') --}}
            <form class="bg-white shadow rounded py-3 px-3" action="{{route('subsistemas.update',$subsistema->id)}} " method="POST">
                @method('PUT')
                @include('subsistemas.partials.form')
            </form>
        </div>
    </div>
</div>
@endsection
