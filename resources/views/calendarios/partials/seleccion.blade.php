    <div class="row">
        <div class="form-group col-md-4">
            <label for="plan" class="text-capitalize font-weight-bold">Selecciones Plan de Mantenimiento</label>
            <select class="form-control text-capitalize" name="plan" id="plan"
                title="{{__('selectcione plan de mantenimiento')}}"
                >
                @foreach ($plans as $plan)
                <option value="{{$plan->id}}"
                  >{{$plan->name}}</option>
                @endforeach
            </select>
            @error('plan')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
            @enderror
        </div>

        <div class="form-group col-md-3">
            <label for="frecuencia" class="text-capitalize font-weight-bold">Seleccione Frecuencia</label>
            <select class="form-control text-capitalize" name="frecuencia" id="frecuencia"
                title="{{__('selectcione frecuencia')}}">
                <option value="7">semanal</option>
                <option value="15">quincenal</option>
                <option value="30">mensual</option>
                <option value="60">bimensual</option>
                <option value="90">trimestral</option>
                <option value="120">cuatrimestral</option>
                <option value="180">semestral</option>
                <option value="360">anual</option>
                <option value="1">diaria</option>
                <option value="-1">todas</option>
            </select>
        </div>
        <div class="row">

        <div class="form-group col-md-6 d-flex justify-content-between ">
            <span class="mr-2">
                <label for="selec" class="text-capitalize font-weight-bold">Selec.</label>
            <button class="btn btn-outline-success"
            id="filtrar"><i class="fa fa-search" aria-hidden="true"></i>
            </button>
            </span>

            <span>
                 <label for="reset" class="text-capitalize font-weight-bold">Reset</label>
            <button class="btn btn-outline-danger"
            id="reset"
            ><i class="fa fa-search" aria-hidden="true"></i>
            </button>
            </span>
        </div>
        </div>

</div>
