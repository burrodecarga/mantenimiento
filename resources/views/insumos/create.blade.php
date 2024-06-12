@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-8 mx-auto">
            <h4 class="texth4"><strong class="text-capitalize">{{__('new record')}}</h4>
            {{-- @include('partials.error') --}}
            <form class="bg-white shadow rounded py-3 px-3" action="{{route('insumos.store')}}" method="POST">
               @method('post')
                @include('insumos.partials.form')
            </form>
        </div>
    </div>
</div>
@endsection
