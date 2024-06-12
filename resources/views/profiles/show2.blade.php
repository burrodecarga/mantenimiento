@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-4 cxy bg-white shadow">
            <img src="{{asset('app/avatars/'.$user->avatar)}} " alt="" class="img-fluid">
        </div>
        <div class="col-8">
            @include('partials.error')
     <form class="bg-white shadow rounded py-3 px-4" method="GET"
                action="{{route('profiles.update',$user->profile->id)}} " enctype="multipart/form-data">

                @csrf
                <div class="row">
                    <div class="form-group col-8">
                        <label for="name"><strong class="text-capitalize">{{__("name")}}</strong></label>
                        <input type="text" name="name" id="name"
                            class="form-control form-control-sm bg-light border-0 shadow-sm" value="{{$user->name}} " />
                    </div>
                    <div class="form-group col-4">
                        <label for="card_id"><strong class="text-capitalize">{{__("card id")}}</strong></label>
                        <input type="text" name="card_id" id="card_id"
                            class="form-control form-control-sm bg-light border-0 shadow-sm input-sm"
                            value="{{$user->profile->card_id}} " />
                    </div>
                    <div class="form-group col-6">
                        <label for="name"><strong class="text-capitalize">{{__("phone")}}</strong></label>
                        <input type="text" name="phone" id="phone"
                            class="form-control form-control-sm bg-light border-0 shadow-sm"
                            value="{{$user->profile->phone}} " />
                    </div>
                    <div class="form-group col-6">
                        <label for="card_id"><strong class="text-capitalize">{{__("movil")}}</strong></label>
                        <input type="text" name="movil" id="movil"
                            class="form-control form-control-sm bg-light border-0 shadow-sm input-sm"
                            value="{{$user->profile->movil}} " />
                    </div>

                    <div class="form-group col-12">
                        <label for="address"><strong class="text-capitalize">{{__('address')}}</strong></label>
                        <input type="text" name="address" id="address"
                            class="form-control form-control-sm bg-light border-0 shadow-sm"
                            value="{{$user->profile->address}} " />
                    </div>
                </div>
               </div>
                    </div>
                    <!-- Fin de Row -->

                    <div class="row">
                        <div class="col-4 bg-white shadow my-2">
                            <ul class="list-group">
                                <li class="list-group-item border-0 d-flex" title="twitter">
                                    <i class="fab fa-twitter fa-2x mr-2 text-info float-left" aria-hidden="true"></i>
                                    <input type="text" name="twitter"
                                        class="form-control form-control-sm bg-light border-0 shadow-sm float-right"
                                        value="{{$user->profile->twitter}} " />
                                </li>
                                <li class="list-group-item border-0 d-flex" title="facebook">
                                    <i class="fab fa-facebook fa-2x mr-2 text-primary" aria-hidden="true"></i>
                                    <input type="text" name="facebook"
                                        class="form-control form-control-sm bg-light border-0 shadow-sm float-right"
                                        value="{{$user->profile->facebook}} " />
                                </li>
                                <li class="list-group-item border-0 d-flex" title="instagram">
                                    <i class="fab fa-instagram fa-2x mr-2 text-danger" aria-hidden="true"></i>
                                    <input type="text" name="instagram"
                                        class="form-control form-control-sm bg-light border-0 shadow-sm float-right"
                                        value="{{$user->profile->instagram}} " />
                                </li>
                                <li class="list-group-item border-0 d-flex" title="youtube">
                                    <i class="fab fa-youtube fa-2x mr-2 text-danger" aria-hidden="true"></i>
                                    <input type="text" name="youtube"
                                        class="form-control form-control-sm bg-light border-0 shadow-sm float-right"
                                        value="{{$user->profile->yotube}} " /></li>
                                <li class="list-group-item border-0 d-flex" title="email">
                                    <i class="fas fa-envelope fa-2x mr-2 text-success" aria-hidden="true"></i>
                                    <input type="text" name="email"
                                        class="form-control form-control-sm bg-light border-0 shadow-sm float-right"
                                        value="{{$user->profile->email}} " />
                                </li>
                            </ul>
                        </div>
                        <div class="col-8 cxy  my-2 py-3 px-3">
                            <div class="py-4 px-3 bg-white w-100 shadow">
                                <div class="form-group">
                                    <label for="profession"><strong class="text-capitalize">{{__('profession')}}</strong></label>
                                    <input type="text" name="profession" id="profession"
                                        class="form-control form-control-sm bg-light border-0 shadow-sm"
                                        value="{{$user->profile->profession}} " />
                                </div>
                            </div>

                            <div class="py-4 px-3 bg-white w-100 shadow">
                                <div class="form-group">
                                    <label for="category"><strong class="text-capitalize">{{__('specialty')}}</strong></label>
                                    <input type="text" name="category" id="category"
                                        class="form-control form-control-sm bg-light border-0 shadow-sm"
                                        value="{{$user->profile->category}} " />
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-12">
                        <input type="file" name="avatar" class="btn btn-success btn-sm">

                        <button type="submit" class="btn btn-danger float-right ml-3 btn-sm" role="button">Moficar</button>

                        <a href="{{route('home')}} " class="btn btn-success float-right ml-3 btn-sm">Regresar</a>
                    </div>
</form>
</div>
@endsection
