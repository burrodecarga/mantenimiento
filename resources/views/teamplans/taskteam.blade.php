@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mx-auto">
            @include('partials.success')
            <form class="bg-white shadow rounded py-3 px-3" action="{{route('teamplans.store',$task->id)}} "  method="POST">
                @method('PUT')
                @csrf
                    <div class="form-group col-12 text-center">
                                <h4>Selección de Equipo de Trabajo</h4>
                                <hr>
                                <h5>Seleccionador: {{Auth::user()->name}}</h5>
                                <hr>
                                fecha: {{fecha(now())}} hora: {{hora(now())}}
                    </div>
                    <div class="form-group col-md-12">
                                <h3 class="display-6 text-capitalize font-weight-bold text-center">
                                    {{__('Seleccion de Equipo de trabajo')}}</h3>
                                <hr>
                     </div>
                    <div class="row p-3 m-2">
                      @foreach ($teams as $p)
                      @if($p->responsable_id<>null)
                      <div class="col-md-4 p-3 border">
                          <div class="">
                             <span  class="ml-3">
                             <input type="radio" class="form-check-input" name="team_id" id="teams" value="{{ $p->id }}"
                           @if($p->id==$task->team_id) checked @endif >
                          </span>
                          <span class="ml-3">
                              {{$p->name}}
                          </span>
                          </div>
                          <div>
                              <ul>
                                @foreach($p->users as $u)
                                <li>{{$u->name}}</li>
                                @endforeach
                            </ul>
                            <span>Responsable: {{$p->responsable}}</span>
                          </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-success text-capitalize">{{__('save')}}</button>
                            <a href="{{route('home')}}" class="btn btn-info mt-2 mb-2 text-capitalize">{{__('back')}} </a>
                    </div>
         </form>
        </div>
    </div>
</div>
@endsection



