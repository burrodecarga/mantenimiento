@csrf
<input type="hidden" name="id" value="{{$recurso->id}}" />
<div class="form-group">
    <h4>Recurso de Falla</h4>
    <hr>
    <h5>{{$recurso->name}}</h5>
    <h6>{{$recurso->tipo}}</h6>
    <hr>
    fecha: {{fecha(now())}} hora: {{hora(now())}}
</div>
<div class="row">
<div class="form-group col-md-12">
    <h3 class="display-6 text-capitalize font-weight-bold">{{__('Modificación de valores del recurso')}}</h3>
    <hr>
</div>
<div class="form-group col-12 col-md-6">
    <label for="name" class="form-label text-capitalize font-weight-bold">{{__('name of tool')}}
    </label>
    <input id="name" type="text" name="name" value="{{old('name', $recurso->name)}}"
        class="form-control bg-light shadow-ed  @error('name')is-invalid @else border-0 @enderror" readonly>
    @error('name')
    <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
    @enderror
</div>
<div class="form-group col-12 col-md-3">
    <label for="precio" class="form-label text-capitalize font-weight-bold">{{__('precio')}}
    </label>
    <input id="precio" type="text" name="precio" value="{{old('precio', $recurso->precio)}}"
        class="form-control bg-light shadow-ed  @error('precio')is-invalid @else border-0 @enderror">
    @error('precio')
    <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
    @enderror
</div>
<div class="form-group col-12 col-md-3">
    <label for="cantidad" class="form-label text-capitalize font-weight-bold">{{__('cantidad')}}
    </label>
    <input id="cantidad" type="text" name="cantidad" value="{{old('cantidad', $recurso->cantidad)}}"
        class="form-control bg-light shadow-ed  @error('cantidad')is-invalid @else border-0 @enderror">
    @error('cantidad')
    <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
    @enderror
</div>
</div>

<div class="form-group">
    <button class="btn btn-success text-capitalize">{{__($btn)}}</button>
    <a href="{{route('teamfallas.report',$recurso->falla_id)}}" class="btn btn-info mt-2 mb-2 text-capitalize">{{__('back')}} </a>
</div>
