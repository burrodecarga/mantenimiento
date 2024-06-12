@csrf
<div class="row">
<input type="hidden" name="id" value="{{$plan->id}}"/>
<div class="form-group col-12 col-md-6">
    <label for="name" class="form-label text-capitalize font-weight-bold">{{__('nombre del plan')}} </label>
    <input id="name" type="text" name="name" value="{{old('name', $plan->name)}}"
        class="form-control bg-light shadow-ed  @error('name')is-invalid @else border-0 @enderror" readOnly/>
    @error('name')
    <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
    @enderror
</div>
<div class="form-group col-12 col-md-3">
    <label for="fecha_inicio"
        class="form-label text-capitalize font-weight-bold">{{__('fecha de inicio')}}</label>
    <input id="fecha_inicio" type="date" name="fecha_inicio" value="{{fechaf($plan->fecha_inicio)}}"
        class="form-control bg-light shadow-ed  @error('fecha_inicio')is-invalid @else border-0 @enderror"/>
    @error('fecha_inicio')
    <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
    @enderror
</div>
<div class="form-group col-12 col-md-3">
    <label for="hora_inicio"
        class="form-label text-capitalize font-weight-bold">{{__('hora de inicio')}}</label>
    <input id="hora_inicio" type="time" name="hora_inicio" value="{{$plan->hora_inicio}}"
        class="form-control bg-light shadow-ed  @error('hora_inicio')is-invalid @else border-0 @enderror"
      />
    @error('hora_inicio')
    <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
    @enderror
</div>

<div class="form-group col-12 col-md-3">
  <label for="turnos_laborables">Turnos Laborables</label>
  <select class="form-control bg-light shadow-ed  @error('turnos_laborables')is-invalid @else border-0 @enderror" name="turnos_laborables" id="turnos_laborables" disabled="disabled">
    <option value="1">{{$plan->turnos_laborables}} turno diario</option>
  </select>
</div>

<div class="form-group col-12 col-md-2">
    <label for="jornada_diaria">Jornada diaria</label>
<input type="text" name="jornada_diaria" id="jornada_diaria" value="{{old('jornada_diaria',$plan->jornada_diaria)}}"
class="form-control bg-light shadow-ed  @error('jornada_diaria')is-invalid @else border-0 @enderror" disabled="disabled"/>
@error('jornada_diaria')
<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
@enderror
</div>

<div class="form-group col-12 col-md-2">
    <label for="jornada_semanal">Jornada semanal</label>
<input type="text" name="jornada_semanal" id="jornada_semanal" value="{{old('jornada_semanal',$plan->jornada_semanal)}}"
class="form-control bg-light shadow-ed  @error('jornada_semanal')is-invalid @else border-0 @enderror" readOnly/>
@error('jornada_semanal')
<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
@enderror
</div>

<div class="form-group col-12 col-md-3">
    <label for="hora_descanso"
        class="form-label text-capitalize font-weight-bold">{{__('hora de descanso')}}</label>
        <input id="hora_descanso" type="time" name="hora_descanso" value="{{$plan->hora_descanso}}"
        class="form-control bg-light shadow-ed  @error('hora_descanso')is-invalid @else border-0 @enderror" readOnly
      />
    @error('hora_descanso')
    <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
    @enderror
</div>

<div class="form-group col-12 col-md-2">
    <label for="horas_descanso">Descanso</label>
    <select class="form-control bg-light shadow-ed  @error('name')is-invalid @else border-0 @enderror" name="horas_descanso" id="horas_descanso" disabled="disabled">
    <option value="15" @if($plan->horas_descanso==15) selected @endif>{{$plan->horas_descanso}} minutos</option>

      </select>
@error('horas_descanso')
<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
@enderror
</div>


<div class="form-group col-12 col-md-3">
    <label for="laborar_feriado">Labora Feriado</label>
    <select class="form-control bg-light shadow-ed  @error('laborar_feriado')is-invalid @else border-0 @enderror" name="laborar_feriado" id="laborar_feriado" disabled="disabled">
      <option value="0">@if(!$plan->laborar_feriado)No labora en Feriado @else Labora en día Feriado @endif</option>
    </select>
    @error('laborar_feriado')
<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
@enderror
  </div>

  <div class="form-group col-12 col-md-3">
    <label for="laborar_sobretiempo">Labora Sobretiempo</label>
    <select class="form-control bg-light shadow-ed  @error('name')is-invalid @else border-0 @enderror" name="laborar_sobretiempo" id="laborar_sobretiempo" disabled="disabled">
        <option value="0">@if(!$plan->laborar_sobretiempo)No labora Sobretiempo @else Labora Sobretiempo @endif</option>
    </select>
    @error('laborar_sobretiempo')
<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
@enderror
  </div>

  <div class="form-group col-12 col-md-6">
    <label for="team_id">Equipo de Trabajo y Responsable de tarea</label>
    <select class="form-control bg-light shadow-ed  @error('name')is-invalid @else border-0 @enderror" name="team_id" id="team_id">
        @foreach ($teams as $t)
    <option value="{{$t->id}}">{{$t->name}}-{{$t->responsable}}</option>
        @endforeach
    </select>
    @error('laborar_sobretiempo')
<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
@enderror
  </div>




<div class="form-group col-12">
  <button class="btn btn-success text-capitalize">{{__($btn)}}</button>
<a href="{{route('plans.index')}}" class="btn btn-info mt-2 mb-2 text-capitalize">{{__('back')}} </a>
</div>
</div>


