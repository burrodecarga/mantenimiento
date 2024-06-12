@csrf

<div class="row">

<div class="form-group col-12 col-md-6">
    <label for="name" class="form-label font-weight-bold">{{__('Name')}} </label>
    <input id="name" type="text" name="name" value="{{old('name', $role->name)}}"
        class="form-control bg-light shadow-sm  @error('name')is-invalid @else border-0 @enderror">
    @error('name')
    <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
    @enderror
</div>

<div class="form-group col-12 col-md-6">


    <label for="area" class="text-capitalize font-weight-bold">Área de Trabajo
    </label>
    <select class="form-control selectpicker text-capitalize" name="area" id="area"
    title="{{__('select area de trabajo')}}">
      <option value="operativa" @if('operativa'==$role->area) selected @endif>Operativa</option>
      <option value="administrativa" @if('administrativa'==$role->area) selected @endif>Administrativa</option>
      <option value="informatica" @if('informatica'==$role->area) selected @endif>Informática</option>
      <option value="tecnica" @if('tecnica'==$role->area) selected @endif>Técnica</option>
      <option value="planificacion" @if('planificacion'==$role->area) selected @endif>Planificación</option>
    </select>
  </div>





</div>
@include('roles.partials.permissions')


<button class="btn btn-success text-capitalize">{{__($btn)}}</button>
<a href="{{route('roles.index')}}" class="btn btn-info mt-2 mb-2 text-capitalize">{{__('back')}} </a>
