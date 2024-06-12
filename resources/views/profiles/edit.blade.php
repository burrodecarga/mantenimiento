@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 bg-white shadow p-5 rounded text-center">
            <img src="{{asset('app/avatars/'.$user->avatar)}} " alt="{{$user->name}}" class="img-fluid"/>

            <h5 class="text-center shadoe-sm font-weight-bold">{{$user->name}} </h5>
            <h5 class="text-center shadoe-sm font-weight-bold">{{__('Id'). ' : '.$user->card_id}} </h5>

            <ul class="list-group list-group-flush">
                <li class="list-group-item text-capitalize">{{__('address').' : '.$user->address}} </li>
                <li class="list-group-item text-capitalize">{{__('phone').' : '.$user->phone}} </li>
                <li class="list-group-item text-capitalize">{{__('movil').' : '.$user->movil}} </li>
                <li class="list-group-item text-capitalize">{{__('email').' : '.$user->email}} </li>
            </ul>
        </div>
        <div class="col-12 col-md-8 mx-auto">
            <h4>
                <strong>{{ __($title) }}</strong>{{ " : ".__("edit record") }}
            </h4>
            {{-- @include('partials.error') --}}
            <form class="bg-white shadow rounded py-3 px-3" action="{{route('profiles.update',$user->id)}} "
                method="post" enctype="multipart/form-data">
                <div class="row">
                    @method('PUT') @csrf
                    <input type="hidden" name="id" value="{{$user->id}}" />
                    <input type="hidden" name="role" value="role" />
                    <div class="col-12 col-md-5">
                        <div class="form-group">
                            <label for="name" class="form-label text-capitalize font-weight-bold">{{ __("profession") }}
                            </label>
                            <input id="profession" type="text" name="profession"
                                value="{{old('profession', $user->profile->profession)}}"
                                class="form-control bg-light shadow-ed  @error('profession')is-invalid @else border-0 @enderror" />
                            @error('profession')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="specialty"
                                class="form-label text-capitalize font-weight-bold">{{ __("specialty") }}
                            </label>
                            <input id="specialty" type="text" name="specialty"
                                value="{{old('specialty', $user->profile->specialty)}}"
                                class="form-control bg-light shadow-ed  @error('specialty')is-invalid @else border-0 @enderror" />
                            @error('specialty')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="costo"
                                class="form-label text-capitalize font-weight-bold">{{ __("salario") }}
                            </label>
                            <input id="costo" type="text" name="costo"
                                value="{{old('costo', $user->profile->costo)}}"
                                class="form-control bg-light shadow-ed  @error('costo')is-invalid @else border-0 @enderror" />
                            @error('costo')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="twitter" class="form-label text-capitalize font-weight-bold">{{ __("twitter") }}
                        </label>
                        <input id="twitter" type="text" name="twitter"
                            value="{{old('twitter', $user->profile->twitter)}}"
                            class="form-control bg-light shadow-ed  @error('twitter')is-invalid @else border-0 @enderror" />
                        @error('twitter')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="instagram" class="form-label text-capitalize font-weight-bold">{{ __("instagram") }}
                        </label>
                        <input id="instagram" type="text" name="instagram"
                            value="{{old('instagram', $user->profile->instagram)}}"
                            class="form-control bg-light shadow-ed  @error('instagram')is-invalid @else border-0 @enderror" />
                        @error('instagram')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="facebook" class="form-label text-capitalize font-weight-bold">{{ __("facebook") }}
                        </label>
                        <input id="facebook" type="facebook" name="facebook"
                            value="{{old('facebook', $user->profile->facebook)}}"
                            class="form-control bg-light shadow-ed  @error('facebook')is-invalid @else border-0 @enderror" />
                        @error('facebook')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="linkedin" class="form-label text-capitalize font-weight-bold">{{ __("linkedin") }}
                        </label>
                        <input id="linkedin" type="text" name="linkedin"
                            value="{{old('linkedin', $user->profile->linkedin)}}"
                            class="form-control bg-light shadow-ed  @error('linkedin')is-invalid @else border-0 @enderror" />
                        @error('linkedin')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="whatsapp" class="form-label text-capitalize font-weight-bold">{{ __("whatsapp") }}
                        </label>
                        <input id="whatsapp" type="whatsapp" name="whatsapp"
                            value="{{old('whatsapp', $user->profile->whatsapp)}}"
                            class="form-control bg-light shadow-ed  @error('whatsapp')is-invalid @else border-0 @enderror" />
                        @error('whatsapp')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="youtube" class="form-label text-capitalize font-weight-bold">{{ __("youtube") }}
                        </label>
                        <input id="youtube" type="text" name="youtube"
                            value="{{old('youtube', $user->profile->youtube)}}"
                            class="form-control bg-light shadow-ed  @error('youtube')is-invalid @else border-0 @enderror" />
                        @error('youtube')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="wechat" class="form-label text-capitalize font-weight-bold">{{ __("wechat") }}
                        </label>
                        <input id="wechat" type="text" name="wechat" value="{{old('wechat', $user->profile->wechat)}}"
                            class="form-control bg-light shadow-ed  @error('wechat')is-invalid @else border-0 @enderror" />
                        @error('wechat')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="qq" class="form-label text-capitalize font-weight-bold">{{ __("QQ") }}
                        </label>
                        <input id="qq" type="text" name="qq" value="{{old('qq', $user->profile->qq)}}"
                            class="form-control bg-light shadow-ed  @error('qq')is-invalid @else border-0 @enderror" />
                        @error('qq')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-success text-capitalize">
                        {{ __($btn) }}
                    </button>
                    <a href="{{ URL::previous() }}" class="btn btn-info mt-2 mb-2 text-capitalize">{{ __("back") }}
                    </a>
                </div>
        </div>
        </form>
    </div>
</div>
</div>
@endsection
