
<div class="form-group col-md-12">
    <h3 class="display-6 text-capitalize font-weight-bold">{{__('Seleccionar equipos para plan de mantenimiento')}}</h3>
    <hr>
</div>




<input type="hidden" name="id" value="{{$plan->id}}"/>
<div class="form-group col-12 col-md-6">
    <label for="name" class="form-label text-capitalize font-weight-bold">{{__('nombre del plan')}} </label>
    <input id="name" type="text" name="name" value="{{old('name', $plan->name)}}"
        class="form-control bg-light shadow-ed  @error('name')is-invalid @else border-0 @enderror" readonly/>
</div>

<div class="form-group col-md-12">
    <div class="row">
        @foreach ($equipos as $e)

        <div class="form-check col-md-4">
            <label for="c{{$e->id}}" class="form-check-label">
                <input type="checkbox" class="form-check-input" name="equipos_id[]" id="c{{$e->id}}" value="{{ $e->id }}"
               {{ in_array($e->id,$equipos_id) ? "checked" : "" }}>
               <button type="button" class="btn btn-primary mb-1" onclick="chequear({{$e->id}})">
                {{$e->name}} <span class="badge badge-light">{{$e->ubicacion}} </span>
              </button>
            </label>
        </div>
        @endforeach
    </div>
</div>
<div class="form-group col-12">
        <button class="btn btn-success text-capitalize">{{__('guardar')}}</button>
      <a href="{{route('plans.index')}}" class="btn btn-info mt-2 mb-2 text-capitalize">{{__('back')}} </a>
</div>
@section('script')
<script src="{{asset('js/planes.js')}}"></script>
@endsection
