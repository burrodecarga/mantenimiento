@csrf

<input type="hidden" name="id" value="{{$zona->id}}">

<div class="form-group">
    <label for="name" class="form-label text-capitalize font-weight-bold">{{__('zona')}} </label>
    <input id="name" type="text" name="name" value="{{old('name', $zona->name)}}"
        class="form-control bg-light shadow-ed  @error('name')is-invalid @else border-0 @enderror">
    @error('name')
    <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
    @enderror
</div>

<button class="btn btn-success text-capitalize">{{__($btn)}}</button>
<a href="{{route('zonas.index')}}" class="btn btn-info mt-2 mb-2 text-capitalize">{{__('back')}} </a>
