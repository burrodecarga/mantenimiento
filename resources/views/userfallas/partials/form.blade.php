@csrf

<input type="hidden" name="id" value="{{$falla->id}}">
<input type="hidden" name="equipo_id" value="{{$equipo->id}}">

<div class="form-group">
   <h4>Reporte de Falla</h4>
   <hr>
   <h5>{{$equipo->name}}</h5>
   <hr>
   fecha: {{fecha(now())}}  hora: {{hora(now())}}
</div>


<div class="form-group col-md-12">
    <h3 class="display-6 text-capitalize font-weight-bold">{{__('Resumen de Falla')}}</h3>
    <hr>
</div>
<div class="form-group col-md-12">
    <div class="row">
        @foreach ($tipoFalla as $p)
        <div class="form-check col-md-4">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="fallas[]" id="fallas" value="{{ $p }}"
                >{{$p}}
            </label>
        </div>
        @endforeach
    </div>
    @error('fallas')
    <span class="text-danger"><strong>{{$message}}</strong> </span>
    @enderror
</div>



<button class="btn btn-success text-capitalize">{{__($btn)}}</button>
<a href="{{route('userfallas.index')}}" class="btn btn-info mt-2 mb-2 text-capitalize">{{__('back')}} </a>
