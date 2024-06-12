@csrf
<div class="row">

    <input type="hidden" name="id" value="{{$herramienta->id}}" />
    <div class="col-12 col-sm-12 col-lg-8">
        <div class="form-group">
            <label for="name" class="form-label text-capitalize font-weight-bold">{{__('name of tool')}}
            </label>
            <input id="name" type="text" name="name" value="{{old('name', $herramienta->name)}}"
                class="form-control bg-light shadow-ed  @error('name')is-invalid @else border-0 @enderror">
            @error('name')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
            @enderror
        </div>
    </div>

    <div class="col-12 col-sm-12 col-lg-4">
        <div class="form-group">
            <label for="precio" class="form-label text-capitalize font-weight-bold">{{__('price of tool')}}
            </label>
            <input id="precio" type="text" name="precio" value="{{old('precio', $herramienta->precio)}}"
                class="form-control bg-light shadow-ed  @error('precio')is-invalid @else border-0 @enderror">
            @error('precio')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
            @enderror
        </div>
    </div>

    <div class="col-12 col-sm-12 col-lg-6">
        <div class="form-group">
            <label for="existencia" class="form-label text-capitalize font-weight-bold">{{__('Existencia')}}
            </label>
            <input id="existencia" type="text" name="existencia" value="{{old('existencia', $herramienta->existencia)}}"
                class="form-control bg-light shadow-ed  @error('existencia')is-invalid @else border-0 @enderror">
            @error('existencia')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
            @enderror
        </div>
    </div>

    <div class="col-12 col-sm-12 col-lg-6">
        <div class="form-group">
            <label for="proveedor" class="form-label text-capitalize font-weight-bold">{{__('proveedor')}}
            </label>
            <input id="proveedor" type="text" name="proveedor" value="{{old('proveedor', $herramienta->proveedor)}}"
                class="form-control bg-light shadow-ed  @error('proveedor')is-invalid @else border-0 @enderror">
            @error('proveedor')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
            @enderror
        </div>
    </div>



    <div class="col-12">
        <div class="form-group">
            <label for="description" class="form-label text-capitalize font-weight-bold">{{__('description of tool')}}
            </label>
           <textarea name="description" id="description" rows="4" class="form-control bg-light shadow-ed  @error('description')is-invalid @else border-0 @enderror">{{old('description', $herramienta->description)}}</textarea>
            @error('description')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <button class="btn btn-success text-capitalize">{{__($btn)}}</button>
            <a href="{{route('herramientas.index')}}" class="btn btn-info mt-2 mb-2 text-capitalize">{{__('back')}} </a>
        </div>
    </div>
</div>
