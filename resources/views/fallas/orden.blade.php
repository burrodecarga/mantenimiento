@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-8 mx-auto">
            <h4><strong class="text-capitalize">{{__('report fail')}}</h4>
            {{-- @include('partials.error') --}}
            <form class="bg-white shadow rounded py-3 px-3" action="{{route('fallas.store')}}" method="POST">
                @method('POST')
                @include('fallas.partials.orden')
            </form>
        </div>
    </div>
</div>
@endsection
