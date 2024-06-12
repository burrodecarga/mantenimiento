@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-6 mx-auto">
            <h4><strong class="text-capitalize">{{__('Seleccione Team')}}</h4>
            {{-- @include('partials.error') --}}
            @can('teamfallas.store')
            <form class="bg-white shadow rounded py-3 px-3" action="{{route('teamfallas.store')}} " method="POST">
                @method('POST')
                @csrf
                <div class="form-group">
                   <h4>Selección de Equipo de Trabajo</h4>
                   <hr>
                   <h5>{{Auth::user()->name}}</h5>
                   <hr>
                   fecha: {{fecha(now())}}  hora: {{hora(now())}}
                </div>
                <div class="form-group col-md-12">
                    <h3 class="display-6 text-capitalize font-weight-bold">{{__('Seleccion de Equipo de trabajo')}}</h3>
                    <hr>
                </div>
                <div class="form-group col-md-12">
                    <div class="row">
                        @foreach ($teams as $p)
                        <div class="form-check col-md-4">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="team" id="teams" value="{{ $p->id }}"
                                >{{$p->name}}
                            </label>
                        </div>
                        @endforeach
                    </div>
                    @error('team')
                    <span class="text-danger"><strong>{{$message}}</strong> </span>
                    @enderror
                </div>
                <button class="btn btn-success text-capitalize">{{__($btn)}}</button>
                <a href="{{route('home')}}" class="btn btn-info mt-2 mb-2 text-capitalize">{{__('back')}} </a>
            </form>
            @endcan
        </div>
    </div>
</div>
@endsection
