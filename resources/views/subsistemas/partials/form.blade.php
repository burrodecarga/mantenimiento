@csrf

<input type="hidden" name="id" value="{{$subsistema->id}}">
<input type="hidden" name="validador">



<div class="form-group">
    <label for="sistema_id" class="text-capitalize font-weight-bold">sistema</label>
    <select class="form-control selectpicker text-capitalize" name="sistema_id" id="sistema_id"
    title="{{__('select sistema')}}">
      @foreach ($sistemas as $sistema)
      <option value="{{$sistema->id}}" @if($sistema->id==$sistema_id) selected @endif>{{$sistema->name}}</option>
    @endforeach
    </select>
    @error('sistema_id')
    <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
    @enderror

    @error('validador')
    <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
    @enderror
  </div>



<div class="form-group">
    <label for="name" class="form-label text-capitalize font-weight-bold">{{__('name of sistema')}} </label>
    <input id="subsistema" type="text" name="name" value="{{old('name', $subsistema->name)}}"
        class="form-control bg-light shadow-ed  @error('name')is-invalid @else border-0 @enderror">
    @error('name')
    <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
    @enderror
</div>


<div class="form-group">
    <label for="description" class="form-label text-capitalize font-weight-bold">{{__('description')}} </label>
    <textarea id="description" name="description" rows="5"
        class="form-control bg-light shadow-ed  @error('description')is-invalid @else border-0 @enderror">{{old('description', $subsistema->description)}}</textarea>
    @error('description')
    <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
    @enderror
</div>


<button class="btn btn-success text-capitalize">{{__($btn)}}</button>
<a href="{{route('subsistemas.index')}}" class="btn btn-info mt-2 mb-2 text-capitalize">{{__('back')}} </a>
