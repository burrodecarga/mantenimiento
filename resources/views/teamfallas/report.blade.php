@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-4 mx-auto bg-ligth">
            @if(Session::has('message'))
            <div class="alert alert-success" role="alert">
                <p>{{Session::get('message')}} </p>
            </div>
            @endif

            <div class="card p-3">
                <div class="card-header p-0">
                    <h4 class="shadow-sm bg-dark text-white p-2">
                        <strong>{{$user->name}}</strong>
                        <hr>
                        <strong>{{$user->teams->first()->name}}</strong>
                    </h4>
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Professión: @if($user->profile<>null)
                                    {{$user->profile->profession}}
                                    @else N/A @endif</li>
                            <li class="list-group-item">Especialidad: @if($user->profile<>null)
                                    {{$user->profile->specialty}} @else N/A @endif</li>
                            <li class="list-group-item">Ubicación: @if($user->zona<>null) {{$user->zona}} @else
                                    N/A
                                    @endif</li>
                        </ul>
                    </div>
                    <a class="btn btn-sm float-right btn-info m-3" href="{{route('teamfallas.index')}} ">Regresar</a>
                </div>
                <div class="btn-group" role="group" aria-label="Basic example">
                    @can('teamfallas.recursos')
                    <a href="{{route('teamfallas.recursos',[$falla->id,1])}} " class="btn btn-secondary">Repuestos</a>
                    <a href="{{route('teamfallas.recursos',[$falla->id,2])}} " class="btn btn-secondary">Insumos</a>
                    <a href="{{route('teamfallas.recursos',[$falla->id,3])}} " class="btn btn-secondary">Servicios</a>
                    @endcan
                </div>
                <div class="btn-group my-1" role="group" aria-label="Basic example">
                    @can('teamfallas.resumen')
                    <a href="{{route('teamfallas.resumen',[$falla->id])}}  " class="btn btn-success">Despejar</a>
                    @endcan @can('teamfallas.set')
                    <a href="{{route('teamfallas.set',[$falla->id,2])}}  " class="btn btn-primary">Postergar</a>
                    <a href="{{route('teamfallas.set',[$falla->id,3])}}  " class="btn btn-info">Esperar</a>
                    <a href="{{route('teamfallas.set',[$falla->id,0])}}  " class="btn btn-danger">Activa</a>
                    @endcan
                </div>
            </div>
            @can('teamfallas.edit')
            <form action="{{route('teamfallas.imagenStore',$falla->id)}}" method="post" enctype="multipart/form-data"
                class="bg-white shadow rounded px-3 mb-2">
                <hr class="my-2">
                <h4 class="shadow-sm bg-dark text-white p-2">
                    <strong>Imagenes de la falla</strong>
                </h4>
                @csrf
                @method('post')
                <div class="form-group">
                    <input type="file" name="file" id="file">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="body" id="imagen" aria-describedby="helpId"
                        placeholder="">
                </div>
                <button class="btn btn-secondary mb-2" type="submit">guardar</button>
            </form>
            @endcan
        </div>
        <div class="col-12 col-md-8 mx-auto bg-ligth">
            @can('teamfallas.update')
            <form method="POST" action="{{route('teamfallas.update',$falla->id)}} "
                class="bg-white shadow rounded px-3">
                @csrf
                @method('PUT')
                <hr class="my-2">
                <h4 class="shadow-sm bg-dark text-white p-2">
                    <strong>Información técnica de falla</strong>
                </h4>
            <input type="hidden" name="team_integrantes" value="{{$team->integrantes}}">
            <input type="hidden" name="team_id" value="{{$team->id}}">
            <input type="hidden" name="team_costo" value="{{$team->costo}}">
            <input type="hidden" name="team" value="{{$team->name}}">
            <input type="hidden" name="despejada_name" value="{{Auth::user()->name}}">
            <input type="hidden" name="despejada_id" value="{{Auth::user()->id}}">
                <div class="row">
                    <div class="form-group col-12 col-md-2">
                        <label for="team_reparadores">Integrantes</label>
                        <select name="team_reparadores" id="team_reparadores" class="form-control">
                            @for($i=1;$i<=$team->integrantes;$i++)
                                <option value="{{$i}}" @if($falla->integrantes==$i) selected @endif>{{$i}}</option>
                                )>{{$i}}</option>
                                @endfor

                        </select>
                    </div>
                    <div class="form-group col-12 col-md-10">
                        <label for="falla">Falla</label>
                        <input type="text" class="form-control" name="falla" id="falla" aria-describedby="helpId"
                            placeholder="descripción de la falla" value="{{old('falla', $falla->falla)}}" />
                        <small id="helpId" class="form-text text-muted">* Campo obligatorio, falla según
                            especialista</small>
                    </div>
                </div>
                <div class="form-group col-12">
                    <label for="body">Detalle de falla</label>
                    <textarea class="form-control" name="body" id="body" rows="3">{{old('detalles', $falla->detalles)}}
                  </textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-success text-capitalize mb-2">{{__('save')}}</button>
                </div>
            </form>
            @endcan
        </div>
        <div class="col-12 col-md-4">
            <div class="card">
                <img class="card-img-top" src="{{asset('js/holder.js')}}" alt="">
                <div class="card-body">
                    <h4 class="card-title">Repuestos</h4>
                    <ul>
                        @foreach ($repuestos as $repuesto)
                        <li>{{$repuesto->cantidad.' - '.$repuesto->name}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card">
                <img class="card-img-top" src="{{asset('js/holder.js')}}" alt="">
                <div class="card-body">
                    <h4 class="card-title">Insumos</h4>
                    <ul>
                        @foreach ($insumos as $insumo)
                        <li>{{$insumo->cantidad.' - '.$insumo->name}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card">
                <img class="card-img-top" src="{{asset('js/holder.js')}}" alt="">
                <div class="card-body">
                    <h4 class="card-title">Servicios</h4>
                    <ul>
                        @foreach ($servicios as $servicio)
                        <li>{{$servicio->cantidad.' - '.$servicio->name}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-12 d-flex justify-content-center mb-5 my-2">
            @foreach ($imagenes as $imagen)
            <div class="card p-2 mr-2" style="width: 18rem;">
                <img class="card-img-top" src="{{asset('app/'.$imagen->url)}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$falla->falla}}</h5>
                    <p class="card-text">{{$imagen->body}}</p>
                    <a href="{{route('teamfallas.delete_imagen',[$falla->id,$imagen->id])}}"
                        class="btn btn-danger">eliminar</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{asset('vendor/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('js/editor.js')}}"></script>
<script>
    var uno = document.getElementById('imagen');
    uno.innerHTML = 'selecciones imagen';

</script>
@endsection
