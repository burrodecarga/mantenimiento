@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-8 mx-auto">
            <h4><strong class="text-capitalize">{{__('Despeje de fallas')}}</h4>
            {{-- @include('partials.error') --}}
            <form class="bg-white shadow rounded py-3 px-3" action="{{route('userfallas.despejaFallas')}}" method="POST">
                @method('POST')
                @include('userfallas.partials.despeje')
            </form>
        </div>
    </div>
</div>
@endsection
