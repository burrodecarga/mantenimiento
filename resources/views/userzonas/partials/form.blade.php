@csrf

<input type="hidden" name="id" value="{{$user->id}}">

<div class="form-group">
    <label for="name" class="form-label text-capitalize font-weight-bold">{{__('name of userzona')}} </label>
    <input id="name" type="text" name="name" value="{{$user->name}}"
        class="form-control bg-light shadow-ed" readonly>
    @error('name')
    <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
    @enderror
</div>

<div class="form-group">
    <label for="zona_id" class="text-capitalize font-weight-bold">zona</label>
    <select class="form-control text-capitalize" name="zona_id" id="zona_id"
    title="{{__('select zona')}}">
      @foreach ($zonas as $zona)
      <option value="{{$zona->id}}" @if($zona->id==$zona_id) selected @endif>{{$zona->name}}</option>
    @endforeach
    </select>
    @error('zona_id')
    <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
    @enderror
  </div>




<button class="btn btn-success text-capitalize">{{__($btn)}}</button>
<a href="{{route('userzonas.index')}}" class="btn btn-info mt-2 mb-2 text-capitalize">{{__('back')}} </a>
