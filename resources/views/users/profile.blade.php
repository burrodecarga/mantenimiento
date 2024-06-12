@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
            <div class="col-md-4 bg-white shadow p-5 rounded">
                <img src="{{asset('app/avatars/'.$user->avatar)}} " alt="xx">
            </div>
        <div class="col-12 col-md-8 mx-auto">
            <h4>
                <strong>{{ __($title) }}</strong
                >{{ " : ".__("edit record") }}
            </h4>
            {{-- @include('partials.error') --}}
            <form
                class="bg-white shadow rounded py-3 px-3"
                action="{{route('users.updateUser',$user->id)}} "
                method="post"
                enctype="multipart/form-data"
            >
                <div class="row">
                    @method('PUT') @csrf

                    <input type="hidden" name="id" value="{{$user->id}}" />
                    <input type="hidden" name="role" value="role" />
                    <div class="col-12 col-md-8">
                        <div class="form-group">
                            <label
                                for="name"
                                class="form-label text-capitalize font-weight-bold"
                                >{{ __("name") }}
                            </label>
                            <input
                                id="name"
                                type="text"
                                name="name"
                                value="{{old('name', $user->name)}}"
                                class="form-control bg-light shadow-sm  @error('name')is-invalid @else border-0 @enderror"
                            />
                            @error('name')
                            <span class="invalid-feedback" role="alert"
                                ><strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label
                                for="card_id"
                                class="form-label text-capitalize font-weight-bold"
                                >{{ __("card_id") }}
                            </label>
                            <input
                                id="card_id"
                                type="text"
                                name="card_id"
                                value="{{old('card_id', $user->card_id)}}"
                                class="form-control bg-light shadow-sm  @error('card_id')is-invalid @else border-0 @enderror"
                            />
                            @error('name')
                            <span class="invalid-feedback" role="alert"
                                ><strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label
                                for="address"
                                class="form-label text-capitalize font-weight-bold"
                                >{{ __("address") }}
                            </label>
                            <input
                                id="address"
                                type="text"
                                name="address"
                                value="{{old('address', $user->address)}}"
                                class="form-control bg-light shadow-sm  @error('address')is-invalid @else border-0 @enderror"
                            />
                            @error('address')
                            <span class="invalid-feedback" role="alert"
                                ><strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label
                                for="email"
                                class="form-label text-capitalize font-weight-bold"
                                >{{ __("email") }}
                            </label>
                            <input
                                id="email"
                                type="text"
                                name="email"
                                value="{{old('email', $user->email)}}"
                                class="form-control bg-light shadow-sm  @error('email')is-invalid @else border-0 @enderror"
                            />
                            @error('email')
                            <span class="invalid-feedback" role="alert"
                                ><strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label
                                for="phone"
                                class="form-label text-capitalize font-weight-bold"
                                >{{ __("phone") }}
                            </label>
                            <input
                                id="phone"
                                type="phone"
                                name="phone"
                                value="{{$user->phone}} "
                                class="form-control bg-light shadow-sm  @error('phone')is-invalid @else border-0 @enderror"
                            />
                            @error('phone')
                            <span class="invalid-feedback" role="alert"
                                ><strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label
                                for="movil"
                                class="form-label text-capitalize font-weight-bold"
                                >{{ __("movil") }}
                            </label>
                            <input
                                id="movil"
                                type="text"
                                name="movil"
                                value="{{old('movil', $user->movil)}}"
                                class="form-control bg-light shadow-sm  @error('movil')is-invalid @else border-0 @enderror"
                            />
                            @error('movil')
                            <span class="invalid-feedback" role="alert"
                                ><strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label
                                for="password"
                                class="form-label text-capitalize font-weight-bold"
                                >{{ __("password") }}
                            </label>
                            <input
                                id="password"
                                type="password"
                                name="password"
                                value=""
                                class="form-control bg-light shadow-sm  @error('password')is-invalid @else border-0 @enderror"
                            />
                            <small id="helpId" class="text-muted"
                                >{{ __("no required") }}
                            </small>
                            @error('password')
                            <span class="invalid-feedback" role="alert"
                                ><strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="form-group">
                            <label
                                for="plus"
                                class="form-label text-capitalize font-weight-bold"
                                >{{ __("plus") }}
                            </label>
                            <input
                                id="plus"
                                type="text"
                                name="plus"
                                value="{{old('plus', $user->plus)}}"
                                class="form-control bg-light shadow-sm  @error('plus')is-invalid @else border-0 @enderror"
                            />
                            @error('plus')
                            <span class="invalid-feedback" role="alert"
                                ><strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="avatar">Avatar</label>
                            <input
                                type="file"
                                name="avatar"
                                id="avatar"
                                class="form-control bg-white"
                                style="border:0; color: transparent;"
                            />
                        </div>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-success text-capitalize">
                            {{ __($btn) }}
                        </button>
                        <a
                            href="{{ URL::previous() }}"
                            class="btn btn-info mt-2 mb-2 text-capitalize"
                            >{{ __("back") }}
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
