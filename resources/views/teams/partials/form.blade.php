@csrf

<input type="hidden" name="id" value="{{$team->id}}">

<div class="form-group">
    <label for="name" class="form-label text-capitalize font-weight-bold">{{__('nombre del equipo de tarea')}} </label>
    <input id="name" type="text" name="name" value="{{old('name', $team->name)}}"
        class="form-control bg-light shadow-ed  @error('name')is-invalid @else border-0 @enderror">
    @error('name')
    <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
    @enderror
</div>

<div class="form-group">
    <label for="kind" class="form-label text-capitalize font-weight-bold">{{__('tipo de actividad de equipo')}} </label>
    <input id="kind" type="text" name="kind" value="{{old('kind', $team->kind)}}"
        class="form-control bg-light shadow-ed  @error('kind')is-invalid @else border-0 @enderror">
    @error('kind')
    <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
    @enderror
</div>

<div class="form-group">
    <label for="description" class="form-label text-capitalize font-weight-bold">{{__('description')}} </label>
    <textarea id="description"  name="description" value="{{old('description', $team->description)}}"
        class="form-control bg-light shadow-ed  @error('description')is-invalid @else border-0 @enderror"></textarea>
    @error('description')
    <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
    @enderror
</div>


<button class="btn btn-success text-capitalize">{{__($btn)}}</button>
<a href="{{route('teams.index')}}" class="btn btn-info mt-2 mb-2 text-capitalize">{{__('back')}} </a>
