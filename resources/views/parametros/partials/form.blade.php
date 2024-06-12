@csrf

<input type="hidden" name="id" value="{{$parametro->id}}">
<input type="hidden" name="validador">







<div class="form-group">
    <label for="name" class="form-label text-capitalize font-weight-bold">{{__('name of parametro type')}} </label>
    <input id="name" type="text" name="name" value="{{old('name', $parametro->name)}}"
        class="form-control bg-light shadow-ed  @error('name')is-invalid @else border-0 @enderror">
    @error('name')
    <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
    @enderror
</div>

<div class="row">
 <div class="form-group col-6">
    <label for="valor" class="form-label text-capitalize font-weight-bold">{{__('valor of parametro type')}} </label>
    <input id="valor" type="text" name="valor" value="{{old('valor', $parametro->valor)}}"
        class="form-control bg-light shadow-ed  @error('valor')is-invalid @else border-0 @enderror">
    @error('valor')
    <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
    @enderror
</div>

<div class="form-group col-6">
    <label for="unidad" class="form-label text-capitalize font-weight-bold">{{__('unidad of parametro type')}} </label>
    <input id="unidad" type="text" name="unidad" value="{{old('unidad', $parametro->unidad)}}"
        class="form-control bg-light shadow-ed  @error('unidad')is-invalid @else border-0 @enderror">
    @error('unidad')
    <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
    @enderror
</div>
</div>
<div class="form-group">
        <label for="description" class="form-label text-capitalize font-weight-bold">{{__('description')}} </label>
        <textarea id="description" name="description" rows="5"
            class="form-control bg-light shadow-ed  @error('description')is-invalid @else border-0 @enderror">{{old('description', $parametro->description)}}</textarea>
        @error('description')
        <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
        @enderror
    </div>



<button class="btn btn-success text-capitalize">{{__($btn)}}</button>
<a href="{{route('parametros.index')}}" class="btn btn-info mt-2 mb-2 text-capitalize">{{__('back')}} </a>



