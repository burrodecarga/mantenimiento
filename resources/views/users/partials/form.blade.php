@csrf
<input type="hidden" name="id" value="{{$user->id}}" />
<div class="form-group">
    <label for="name" class="form-label text-capitalize font-weight-bold">{{__('name')}} </label>
    <input id="name" type="text" name="name" value="{{old('name', $user->name)}}"
        class="form-control bg-light shadow-sm  @error('name')is-invalid @else border-0 @enderror">
    @error('name')
    <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
    @enderror
</div>
<div class="form-group">
    <label for="email" class="form-label text-capitalize font-weight-bold">{{__('email')}} </label>
    <input id="email" type="text" name="email" value="{{old('email', $user->email)}}"
        class="form-control bg-light shadow-sm  @error('email')is-invalid @else border-0 @enderror">
    @error('email')
    <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
    @enderror
</div>
<div class="form-group">
    <label for="password" class="form-label text-capitalize font-weight-bold">{{__('password')}} </label>
    <input id="password" type="password" name="password" value=""
        class="form-control bg-light shadow-sm  @error('password')is-invalid @else border-0 @enderror">
    <small id="helpId" class="text-muted">{{__('no required')}} </small>
    @error('password')
    <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
    @enderror
</div>
<div class="form-group">
    <label for="role" class="text-capitalize font-weight-bold">role</label>
    <select class="form-control selectpicker" name="role" id="role" title="{{__('Select Role')}}">
        @foreach ($roles as $role)
        <option value="{{$role->id}}" @if($role->id==$userRole) selected @endif>{{$role->name}}</option>
        @endforeach
    </select>
    @error('role')
    <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
    @enderror
</div>
<button class="btn btn-success text-capitalize">{{__($btn)}}</button>
<a href="{{route('users.index')}}" class="btn btn-info mt-2 mb-2 text-capitalize">{{__('back')}} </a>
