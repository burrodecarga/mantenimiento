@csrf
<input type="hidden" name="id" value="{{$protocolo->id}}">
<div class="row">
    <div class="form-group col-3">
        <label for="tipo_id" class="form-label text-capitalize font-weight-bold">{{__('equipment type')}}</label>
        <select class="form-control bg-light shadow-ed  @error('tipo_id')is-invalid @else border-0 @enderror"
            name="tipo_id" id="tipo_id">
            @foreach ($tipos_text as $p)
            <option value="{{$p->id}}" @if($p->id==$protocolo->tipo_id) selected @endif>{{$p->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-6">
        <label for="tarea_tipo" class="form-label text-capitalize font-weight-bold">{{__('type of task')}}</label>
        <select class="form-control bg-light shadow-ed  @error('tarea_tipo')is-invalid @else border-0 @enderror"
            name="tarea_tipo" id="tarea_tipo">
            @foreach ($tareas as $p)
            <option value="{{$p}}" @if(Str::slug($p)==Str::slug($protocolo->tarea_tipo)) selected @endif>{{$p}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-3">
        <label for="especialidad" class="form-label text-capitalize font-weight-bold">{{__('especialidad')}}</label>
        <select class="form-control bg-light shadow-ed  @error('especialidad')is-invalid @else border-0 @enderror"
            name="especialidad" id="especialidad">
            @foreach ($especialidad as $p)
            <option value="{{$p}}" @if($p==$protocolo->especialidad) selected @endif>{{$p}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-12">
        <label for="tarea" class="form-label text-capitalize font-weight-bold">{{__('task')}} </label>
        <input id="tarea" type="text" name="tarea" value="{{old('tarea', $protocolo->tarea)}}"
            class="form-control bg-light shadow-ed  @error('tarea')is-invalid @else border-0 @enderror">
        @error('tarea')
        <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
        @enderror
    </div>
    <div class="form-group  shadow-sm col-3">
        <label for="tarea_posicion"
            class="form-label text-capitalize font-weight-bold">{{__('posicion de la tarea / numeral')}}</label>
        <select class="form-control bg-light shadow-ed  @error('tarea_posicion')is-invalid @else border-0 @enderror"
            name="tarea_posicion" id="tarea_posicion">
            @for($p=1;$p<240;$p++) <option value="{{$p}}" @if($p==$protocolo->tarea_posicion) selected @endif>{{$p}}
                </option>
                @endfor
        </select>
        <small id="helpId" class="text-muted">
            {{__('interval').' 1,2,3,4,8...'.__('step')}}
        </small>
        @error('tarea_posicion')
        <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
        @enderror
    </div>
    <div class="form-group  shadow-sm col-5">
        <label for="tarea_restriccion"
            class="form-label text-capitalize font-weight-bold">{{__('tarea restriccion / tareas previas')}}</label>
        <select class="form-control bg-light shadow-ed  @error('tarea_restriccion')is-invalid @else border-0 @enderror"
            name="tarea_restriccion" id="tarea_restriccion">

            @for($p=0;$p<240;$p++) <option value="{{$p}}" @if($p==$protocolo->tarea_restriccion) selected
                @endif>{{'La tarea N° '.$p.' se debe realizar previamente'}}
                </option>
                @endfor
        </select>
        @error('tarea_restriccion')
        <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
        @enderror
    </div>
    <div class="form-group  shadow-sm col-2">
        <label for="permisos" class="form-label text-capitalize font-weight-bold">{{__('permissions')}}</label>
        <select class="form-control bg-light shadow-ed  @error('permisos')is-invalid @else border-0 @enderror"
            name="permisos" id="permisos">
            @foreach ($permisos as $p)
            <option value="{{$p}}" @if($p==$protocolo->permisos) selected @endif>{{$p}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group  shadow-sm col-2">
        <label for="frecuencia" class="form-label text-capitalize font-weight-bold">{{__('frecuencia / días')}}</label>
        <select class="form-control bg-light shadow-ed  @error('frecuencia')is-invalid @else border-0 @enderror"
            name="frecuencia" id="frecuencia">
            @foreach ($frecuencia as $p)
            <option value="{{$p}}" @if($p==$protocolo->frecuencia) selected @endif>{{$p}}</option>
            @endforeach
        </select>
        <small id="helpId" class="text-muted">
            {{__('interval días').' 1,7,15,30,45,60...'.__('días')}}
        </small>
        @error('duration')
        <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
        @enderror
    </div>
    <div class="form-group  shadow-sm col-3">
        <label for="protocolo" class="form-label text-capitalize font-weight-bold">{{__('type of protocol')}}</label>
        <select class="form-control bg-light shadow-ed  @error('protocolo')is-invalid @else border-0 @enderror" name="protocolo"
            id="protocolo">
            @foreach ($tipos as $p)
            <option value="{{$p}}" @if($p==$protocolo->protocolo) selected @endif>{{$p}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group  shadow-sm col-2">
        <label for="duracion" class="form-label text-capitalize font-weight-bold">{{__('duracion / horas')}}</label>
        <select class="form-control bg-light shadow-ed  @error('duracion')is-invalid @else border-0 @enderror"
            name="duracion" id="duracion">
            @for($p=1;$p<24;$p++) <option value="{{$p}}" @if($p==$protocolo->duracion) selected @endif>{{$p}}
                </option>
                @endfor
        </select>
        <small id="helpId" class="text-muted">
            {{__('interval hours').' 1,2,3,4,8...'.__('hours')}}
        </small>
        @error('duration')
        <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
        @enderror
    </div>

    <div class="form-group  shadow-sm col-3">
        <label for="seguridad" class="form-label text-capitalize font-weight-bold">{{__('seguridad / Riesgo')}}</label>
        <select class="form-control bg-light shadow-ed  @error('seguridad')is-invalid @else border-0 @enderror"
            name="seguridad" id="seguridad">
            @foreach ($seguridad as $p)
            <option value="{{$p}}" @if($p==$protocolo->seguridad) selected @endif>{{$p}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group  shadow-sm col-4">
        <label for="condiciones"
            class="form-label text-capitalize font-weight-bold">{{__('condiciones / Riesgo')}}</label>
        <select class="form-control bg-light shadow-ed  @error('condiciones')is-invalid @else border-0 @enderror"
            name="condiciones" id="condiciones">
            @foreach ($condiciones as $p)
            <option value="{{$p}}" @if($p==$protocolo->condiciones) selected @endif>{{$p}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-12 my-2">
        <label for="description" class="form-label text-capitalize font-weight-bold">{{__('description')}} </label>
        <textarea id="description" name="description"
            class="form-control bg-light shadow-ed  @error('description')is-invalid @else border-0 @enderror">{{old('description', $protocolo->description)}}</textarea>
        @error('description')
        <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
        @enderror
    </div>
    <div class="form-group col-12 my-2">
        <button class="btn btn-success text-capitalize">{{__($btn)}}</button>
        <a href="{{route('protocolos.index')}}" class="btn btn-info mt-2 mb-2 text-capitalize">{{__('back')}} </a>
    </div>
</div>
