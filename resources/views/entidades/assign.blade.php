@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mx-auto">
            <div class="col-12 mb-2">
                    <form class="form-inline my-2 my-lg-0 float-right">
                        @csrf @method('post')
                        <input class="form-control mr-sm-2" type="search" name="search" placeholder="{{__('Search')}}" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">{{__('Search')}} </button>
                    </form>
                </div>
        <div class="col-md-4 bg-white border-1 shadow mx-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-capitalize font-weigth-bold">{{__('name')}}</th>
                        <th class="text-capitalize font-weigth-bold">{{__('assign')}} </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user )
                       <tr>
                        <td scope="row">{{$user->name}}</td>
                        <td scope="row"><a href="{{route('teams.team',[$user->id,$team->id])}} "><i class="fa fa-arrow-alt-circle-right text-success" aria-hidden="true"></i> </a></td>

                     </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
        <div class="col-md-3 bg-white border-1 shadow mx-auto">
           <div class="card my-3 p-2">
               <div class="card-title text-center font-weight-bold text-capitalize">{{__('team of work')}} </div>
               <div class="card-body text-center">
                   <strong>{{$team->specialty}}</strong><hr>
                   <strong>{{$team->name}}</strong><hr>
                   <strong>{{__('members')}} : {{count($assigns)}}</strong><hr>
                </div>
        <a href="{{route('teams.index')}}" class="btn btn-info mt-2 mb-2 text-capitalize">{{__('back')}} </a>

           </div>
        </div>
        <div class="col-md-4 bg-white border-1 shadow mx-auto">
                <div class="card my-3 p-2">
                        <div class="card-body text-center">
                            <strong>{{$team->specialty}}</strong><hr class="m-0">
                            <strong>{{$team->name}}</strong>
                         </div>
                         <table class="table">
                                <thead>
                                    <tr>
                                        <th>{{__('no assign')}} </th>
                                        <th>{{__('Name')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($assigns as $user )
                                       <tr>
                                        <td scope="row" class="text-center"><a href="{{route('teams.noTeam',[$user->id,$team->id])}} "><i class="fa fa-arrow-alt-circle-left text-danger" aria-hidden="true"></i> </a></td>
                                        <td scope="row">{{$user->name}}</td>
                                     </tr>
                                    @endforeach
                                </tbody>
                            </table>
                     </div>
        </div>
    </div>
</div>

@endsection
