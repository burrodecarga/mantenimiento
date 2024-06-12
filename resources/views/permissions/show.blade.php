@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-6 mx-auto">
            <h4><strong>{{$title}}</strong>{{' : '.__($permission->name)}}</h4>
            {{-- @include('partials.error') --}}
            <form class="bg-white shadow rounded py-3 px-3" action="{{route('permissions.index')}}" >
                @include('permissions.partials.form')
                @include('permissions.partials.roles')
            </form>
        </div>
    </div>
</div>
@endsection
