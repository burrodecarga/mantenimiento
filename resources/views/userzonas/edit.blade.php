@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-6 mx-auto">
            <h4><strong class="text-capitalize">{{__('assing zone')}}</h4>
            {{-- @include('partials.error') --}}
            <form class="bg-white shadow rounded py-3 px-3" action="{{route('userzonas.update',$user->id)}} " method="POST">
                @method('PUT')
                @include('userzonas.partials.form')
            </form>
        </div>
    </div>
</div>
@endsection
