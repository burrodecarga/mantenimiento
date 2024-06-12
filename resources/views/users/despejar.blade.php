@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 bg-white shadow p-5 rounded">
          <img src="{{asset('app/avatar/'.$user->avatar)}} " alt="">
          <a href="{{URL::previous()}} " class="btn btn-success my-3">{{__('back')}} </a>
        </div>
        <div class="col-md-8">
            <div class="bg-white shadow p-5 rounded">
                <h3 class="text-primary text-capitalize">{{$user->name}}</h3>
                  <span class="text-success text-capitalize"> {{__('role')}}:{{$role}}, </span>

                <hr>

                <h4 class="lead text-primary">Identificador: {{$user->card_id}} </h4>
                <h5 class="font-weigh-bold text-primary">{{__('Email')}}: {{$user->email}} |  {{__('phone')}}: {{$user->phone}} | {{__('movil')}} :{{$user->movil}}
                </h5>
                <h6>
                    <p class="lead text-primary">
                        {{__('Address')}}: {{$user->address}}
                    </p>
                </h6>
                <p class="text-primary">
                    {{$user->created_at->diffForHumans()}}
                </p>
                <ul class="list-group">
                    <h5 class="text-primary text-capitalize">{{__('privileges')}}:</h5>
                @foreach ($permissions as $p)
                    <li class="list-group-item shadow-sm b-0 mb-2 p-1"><span class="ml-3">{{$p->name}}</span></li>
                @endforeach
            </ul>
            </div>

        </div>
    </div>

</div>
@endsection
