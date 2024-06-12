@csrf

<input type="hidden" name="id" value="{{$permission->id}}">

<div class="form-group">
    <label for="permiso" class="form-label font-weight-bold">{{__('nombre del permiso')}} </label>
    <input id="permiso" type="text" name="permiso" value="{{old('permiso', $permission->permiso)}}"
        class="form-control bg-light shadow-sm  @error('permiso')is-invalid @else border-0 @enderror">
    @error('permiso')
    <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
    @enderror
</div>


<div class="form-group">
    <label for="name" class="form-label font-weight-bold">{{__('Ruta')}} </label>
    <input id="name" type="text" name="name" value="{{old('name', $permission->name)}}"
        class="form-control bg-light shadow-sm  @error('name')is-invalid @else border-0 @enderror">
    @error('name')
    <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
    @enderror
</div>



<button class="btn btn-success text-capitalize">{{__($btn)}}</button>
<a href="{{route('permissions.index')}}" class="btn btn-info mt-2 mb-2 text-capitalize">{{__('back')}} </a>
