@csrf

<input type="hidden" name="id" value="{{$sistema->id}}">

<div class="form-group">
    <label for="name" class="form-label text-capitalize font-weight-bold">{{__('name of sistema')}} </label>
    <input id="name" type="text" name="name" value="{{old('name', $sistema->name)}}"
        class="form-control bg-light shadow-ed  @error('name')is-invalid @else border-0 @enderror">
    @error('name')
    <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
    @enderror
</div>


<div class="form-group">
    <label for="description" class="form-label text-capitalize font-weight-bold">{{__('description')}} </label>
    <textarea id="description" name="description" rows="5" 
        class="form-control bg-light shadow-ed  @error('description')is-invalid @else border-0 @enderror">{{old('description', $sistema->description)}}</textarea>
    @error('description')
    <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
    @enderror
</div>


<button class="btn btn-success text-capitalize">{{__($btn)}}</button>
<a href="{{route('sistemas.index')}}" class="btn btn-info mt-2 mb-2 text-capitalize">{{__('back')}} </a>
