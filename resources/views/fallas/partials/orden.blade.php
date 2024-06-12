@csrf

<input type="hidden" name="id" value="{{$falla->id}}" />
<input type="hidden" name="validador" />
<div class="form-group col-12">
    <label for="equipo" class="form-label text-capitalize font-weight-bold">{{__('equipo')}} </label>
    <input id="equipo" type="text" name="equipo" value="{{old('equipo', $falla->equipo_text)}}"
        class="form-control bg-light shadow-ed  @error('equipo')is-invalid @else border-0 @enderror" readonly/>
    @error('equipo')
    <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
    @enderror
</div>

<div class="form-group col-12">
    <label for="falla" class="form-label text-capitalize font-weight-bold">{{__('falla of equipo')}} </label>
    <input id="falla" type="text" name="falla" value="{{old('falla', $falla->falla)}}"
        class="form-control bg-light shadow-ed  @error('falla')is-invalid @else border-0 @enderror" readonly/>
    @error('falla')
    <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
    @enderror
</div>
<div class="form-group col-12">
    <label for="team" class="text-capitalize font-weight-bold">Personal asignado</label>
    <select class="form-control text-capitalize" name="team" id="team" title="{{__('select team')}}">
        @foreach ($teams as $team)
        <option value="{{$team->id}}" @if($team->id==$teamId) selected @endif>{{$team->name.' - '.$team->kind}}</option>
        @endforeach
    </select>
    @error('team')
    <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
    @enderror
</div>
<div class="form-group col-12">
    <button class="btn btn-success text-capitalize">{{__($btn)}}</button>
    <a href="{{route('fallas.index')}}" class="btn btn-info mt-2 mb-2 text-capitalize">{{__('back')}} </a>
</div>
