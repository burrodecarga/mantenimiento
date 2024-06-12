@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-8 mx-auto">
            <h4 class="texth4"><strong class="text-capitalize">{{__('edit record')}}</h4>
            {{-- @include('partials.error') --}}
            <form class="bg-white shadow rounded py-3 px-3" action="{{route('repuestos.update',$repuesto->id)}}" method="POST">
                @method('put')
                @include('repuestos.partials.form')
            </form>
        </div>
    </div>
</div>
@endsection
