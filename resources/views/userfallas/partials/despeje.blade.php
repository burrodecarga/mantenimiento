@csrf

<input type="hidden" name="equipo_id" value="{{$equipo->id}}">

<div class="form-group">
   <h4>Reporte de despeje de Falla</h4>
   <hr>
   <h5>{{$equipo->name}}</h5>
   <hr>
   fecha: {{fecha(now())}}  hora: {{hora(now())}}
</div>


<div class="form-group col-md-12">
    <h3 class="display-6 text-capitalize font-weight-bold">{{__('Resumen de Fallas')}}</h3>
    <hr>
</div>
<div class="form-group col-md-12">
    <div class="row">
        @foreach ($fallas as $p)
        <div class="form-check col-md-12">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="fallas[]" id="fallas" value="{{ $p->id }}"
                >{{$p->reportada_fecha.' - '.$p->reporte}}
            </label><hr>
        </div>
        @endforeach
    </div>
    @error('fallas')
    <span class="text-danger"><strong>{{$message}}</strong> </span>
    @enderror
</div>



<button class="btn btn-success text-capitalize">{{__('save')}}</button>
<a href="{{route('userfallas.index')}}" class="btn btn-info mt-2 mb-2 text-capitalize">{{__('back')}} </a>
