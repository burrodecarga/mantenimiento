@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card my-3">
        <div class="card-body">
            Protocolos para equipos tipo: {{$tipo->name}}
        </div>
    </div>

    <div class="row">
        <div class="col-12 mx-auto">
            <h4 class="text-white"><strong class="text-capitalize">{{__('asignación de parametros')}}</h4>
            {{-- @include('partials.error') --}}
            <form class="bg-white shadow rounded py-3 px-3" action="#" method="POST">
           @csrf
           @method('post')

        <div class="row">
            @foreach ($parametros as $p)
        <div class="col-6">
            <label>
                <input
                type="checkbox"
                id="id"
                value="{{$p->id}}"
                class="mx-2 t"
                name="id[]" @if($parametrosId->contains($p->id))) checked @endif>
                <small>{{$p->tipo}} :</small>
                {{$p->tarea}}<hr>
               </label>
        </div>

        @endforeach
        </div>
 <div class="bg-white shadow rounded py-3 px-3">
        <button class="btn btn-success text-capitalize">{{__($btn)}}</button>
<a href="{{route('tipos.index')}}" class="btn btn-info mt-2 mb-2 text-capitalize">{{__('back')}} </a>

    </div>
    </div>


</form>
</div>
</div>


</div>

</div>

@endsection
