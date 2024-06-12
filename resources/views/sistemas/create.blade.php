@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-6 mx-auto">
            <h4><strong class="text-capitalize">{{__($title)}}</strong>{{' : '.__('new record')}}</h4>
            {{-- @include('partials.error') --}}
            <form class="bg-white shadow rounded py-3 px-3" action="{{route('sistemas.store')}} " method="POST">
                @include('sistemas.partials.form')
            </form>
        </div>
    </div>
</div>
@endsection
