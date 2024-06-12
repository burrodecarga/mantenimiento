@csrf

<input type="hidden" name="id" value="{{$feriado->id}}">

<div class="form-group">
    <label for="name" class="form-label text-capitalize font-weight-bold">{{__('feriado')}} </label>
    <input id="name" type="text" name="name" value="{{old('name', $feriado->name)}}"
        class="form-control bg-light shadow-ed  @error('name')is-invalid @else border-0 @enderror">
    @error('name')
    <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
    @enderror
</div>

<div class="form-group">
    <label for="fecha" class="form-label text-capitalize font-weight-bold">{{__('fecha of feriado')}} </label>
    <input id="fecha" type="date" name="fecha"
    value="{{old('fecha',fechaf($feriado->fecha))}}"
        class="form-control bg-light shadow-ed  @error('fecha')is-invalid @else border-0 @enderror">
    @error('fecha')
    <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
    @enderror
</div>





<button class="btn btn-success text-capitalize">{{__($btn)}}</button>
<a href="{{route('feriados.index')}}" class="btn btn-info mt-2 mb-2 text-capitalize">{{__('back')}} </a>
