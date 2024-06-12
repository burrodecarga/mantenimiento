@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card my-3">
        <div class="card-body">
            Caracteristicas para equipos tipo: {{$tipo->name}}
        </div>
    </div>

    <div class="row">
        <div class="col-12 mx-auto">
            <h4 class="text-white"><strong class="text-capitalize">{{__('asignación de caracteristicas')}}</h4>
            {{-- @include('partials.error') --}}
            @can('tipocaracteristicas.store')
            <form class="bg-white shadow rounded py-3 px-3" action="{{route('tipocaracteristicas.store',$tipo->id)}} "
                method="POST">
                @csrf
                @method('post')

                <div class="row">
                    @foreach ($caracteristicas as $p)
                    <div class="col-3">
                        <label>
                            <input type="checkbox" id="id" value="{{$p->id}}" class="mx-2 t" name="id[]"
                                @if($caracteristicasId->contains($p->id))) checked @endif>
                            {{$p->name}}
                        </label>
                    </div>
                    @endforeach
                </div>
                <div class="bg-white shadow rounded py-3 px-3">
                    <button class="btn btn-success text-capitalize">{{__($btn)}}</button>
                    <a href="{{route('tipos.index')}}" class="btn btn-info mt-2 mb-2 text-capitalize">{{__('back')}}
                    </a>
                </div>
        </div>
        </form>
        @endcan
    </div>
</div>


</div>

</div>

@endsection
