@csrf

<input type="hidden" name="id" value="{{$caracteristica->id}}">

<input type="hidden" name="validador">

  @include('partials.error')


<div class="form-group">
    <label for="name" class="form-label text-capitalize font-weight-bold">{{__('name of caracteristica')}} </label>
    <input id="name" type="text" name="name" value="{{old('name', $caracteristica->name)}}"
        class="form-control bg-light shadow-ed  @error('name')is-invalid @else border-0 @enderror" disabled="false">
    @error('name')
    <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
    @enderror
</div>

<div class="row">
 <div class="form-group col-6">
    <label for="valor" class="form-label text-capitalize font-weight-bold">{{__('valor of caracteristica')}} </label>
    <input id="valor" type="text" name="valor" value="{{old('valor', $caracteristica->valor)}}"
        class="form-control bg-light shadow-ed  @error('valor')is-invalid @else border-0 @enderror">
    @error('valor')
    <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
    @enderror
</div>

<div class="form-group col-6">
    <label for="unidad" class="form-label text-capitalize font-weight-bold">{{__('unidad of caracteristica')}} </label>
    <input id="unidad" type="text" name="unidad" value="{{old('unidad', $caracteristica->unidad)}}"
        class="form-control bg-light shadow-ed  @error('unidad')is-invalid @else border-0 @enderror">
    @error('unidad')
    <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
    @enderror
</div>


<div class="form-group col-6">
    <label for="simbolo" class="form-label text-capitalize font-weight-bold">{{__('simbol of caracteristica')}} </label>
    <input id="simbolo" type="text" name="simbolo" value="{{old('simbolo', $caracteristica->simbolo)}}"
        class="form-control bg-light shadow-ed  @error('simbolo')is-invalid @else border-0 @enderror">
    @error('simbolo')
    <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
    @enderror
</div>
</div>



<button class="btn btn-success text-capitalize">{{__($btn)}}</button>
<a href="{{URL::previous()}} " class="btn btn-info mt-2 mb-2 text-capitalize">{{__('back')}} </a>



