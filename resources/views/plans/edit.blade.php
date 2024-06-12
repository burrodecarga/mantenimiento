@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-10 mx-auto">
            <h4><strong class="text-capitalize">{{__('plan')}}</strong>{{' : '.__('new record')}}</h4>
            {{-- @include('partials.error') --}}

            <form class="bg-white shadow rounded py-3 px-3" action="{{route('plans.update',$plan->id)}} " method="POST">
               @method('PUT')
                @include('plans.partials.form')
            </form>
        </div>
    </div>
</div>
@endsection
