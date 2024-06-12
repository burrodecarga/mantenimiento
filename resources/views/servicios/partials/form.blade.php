@csrf
<div class="row">

    <input type="hidden" name="id" value="{{$servicio->id}}" />
    <div class="col-12 col-sm-12 col-lg-8">
        <div class="form-group">
            <label for="name" class="form-label text-capitalize font-weight-bold">{{__('name of service')}}
            </label>
            <input id="name" type="text" name="name" value="{{old('name', $servicio->name)}}"
                class="form-control bg-light shadow-ed  @error('name')is-invalid @else border-0 @enderror">
            @error('name')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
            @enderror
        </div>
    </div>

    <div class="col-12 col-sm-12 col-lg-4">
        <div class="form-group">
            <label for="precio" class="form-label text-capitalize font-weight-bold">{{__('price of service')}}
            </label>
            <input id="precio" type="text" name="precio" value="{{old('precio', $servicio->precio)}}"
                class="form-control bg-light shadow-ed  @error('precio')is-invalid @else border-0 @enderror">
            @error('precio')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
            @enderror
        </div>
    </div>

    <div class="col-12 col-sm-12 col-lg-6">
        <div class="form-group">
            <label for="proveedor" class="form-label text-capitalize font-weight-bold">{{__('proveedor')}}
            </label>
            <input id="proveedor" type="text" name="proveedor" value="{{old('proveedor', $servicio->proveedor)}}"
                class="form-control bg-light shadow-ed  @error('proveedor')is-invalid @else border-0 @enderror">
            @error('proveedor')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
            @enderror
        </div>
    </div>



    <div class="col-12">
        <div class="form-group">
            <label for="description" class="form-label text-capitalize font-weight-bold">{{__('description of service')}}
            </label>
           <textarea name="description" id="description" rows="4" class="form-control bg-light shadow-ed  @error('description')is-invalid @else border-0 @enderror">{{old('description', $servicio->description)}}</textarea>
            @error('description')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <button class="btn btn-success text-capitalize">{{__($btn)}}</button>
            <a href="{{route('servicios.index')}}" class="btn btn-info mt-2 mb-2 text-capitalize">{{__('back')}} </a>
        </div>
    </div>
</div>
