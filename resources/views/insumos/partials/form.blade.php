@csrf
<div class="row">

    <input type="hidden" name="id" value="{{$insumo->id}}" />
    <div class="col-12 col-sm-12 col-lg-8">
        <div class="form-group">
            <label for="name" class="form-label text-capitalize font-weight-bold">{{__('name of consumable')}}
            </label>
            <input id="name" type="text" name="name" value="{{old('name', $insumo->name)}}"
                class="form-control bg-light shadow-ed  @error('name')is-invalid @else border-0 @enderror">
            @error('name')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
            @enderror
        </div>
    </div>

    <div class="col-12 col-sm-12 col-lg-4">
        <div class="form-group">
            <label for="precio" class="form-label text-capitalize font-weight-bold">{{__('price of consumable')}}
            </label>
            <input id="precio" type="text" name="precio" value="{{old('precio', $insumo->precio)}}"
                class="form-control bg-light shadow-ed  @error('precio')is-invalid @else border-0 @enderror">
            @error('precio')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
            @enderror
        </div>
    </div>

    <div class="col-12 col-sm-12 col-lg-6">
        <div class="form-group">
            <label for="unidad" class="form-label text-capitalize font-weight-bold">{{__('unit of consumable')}}
            </label>
            <input id="unidad" type="text" name="unidad" value="{{old('unidad', $insumo->unidad)}}"
                class="form-control bg-light shadow-ed  @error('unidad')is-invalid @else border-0 @enderror">
            @error('unidad')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
            @enderror
        </div>
    </div>

    <div class="col-12 col-sm-12 col-lg-6">
        <div class="form-group">
            <label for="existencia" class="form-label text-capitalize font-weight-bold">{{__('existence of consumable')}}
            </label>
            <input id="existencia" type="text" name="existencia" value="{{old('existencia', $insumo->existencia)}}"
                class="form-control bg-light shadow-ed  @error('existencia')is-invalid @else border-0 @enderror">
            @error('existencia')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
            @enderror
        </div>
    </div>



    <div class="col-12">
        <div class="form-group">
            <label for="description" class="form-label text-capitalize font-weight-bold">{{__('description of consumable')}}
            </label>
           <textarea name="description" id="description" rows="4" class="form-control bg-light shadow-ed  @error('description')is-invalid @else border-0 @enderror">{{old('description', $insumo->description)}}</textarea>
            @error('description')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong> </span>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <button class="btn btn-success text-capitalize">{{__($btn)}}</button>
            <a href="{{route('insumos.index')}}" class="btn btn-info mt-2 mb-2 text-capitalize">{{__('back')}} </a>
        </div>
    </div>
</div>
