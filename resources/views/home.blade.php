@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Panel Principal</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    Bienvenido:
                    <em><strong>{{Auth::user()->name}}
                        </strong></em>
                    <p>
                        Ingresaste como un:
                        <em>
                            <strong>{{roles(Auth::user()->getRoleNames())}}</strong>
                        </em>
                        <hr>
                        Tú área de servicio es:
                        <em>
                            <strong>{{Auth::user()->zona}}</strong>
                        </em>
                        <hr>
                        Tú equipo de tarea es:
                        <em>
                            <strong>{{Auth::user()->teams->pluck('name')->first()}}</strong>
                        </em>
                    </p>
                        @include('partials.success')
                </div>
                <div>
                    <p>
                        <a class="btn btn-primary ml-3" data-toggle="collapse" href="#collapseExample" role="button"
                            aria-expanded="false" aria-controls="collapseExample">
                            Tus Permisos son:
                        </a>
                    </p>
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                            <ul class="list-group">
                                @foreach ($permisos as $p)
                                <li class="list-group-item">{{$p}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
