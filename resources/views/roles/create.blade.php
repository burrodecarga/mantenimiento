@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-12 mx-auto">
            <h4><strong>{{$title}}</strong>{{' : '.__('new record')}}</h4>
            {{-- @include('partials.error') --}}
            <form class="bg-white shadow rounded py-3 px-3" action="{{route('roles.store')}} " method="POST">
                @include('roles.partials.form')
            </form>
        </div>
    </div>
</div>
@endsection
