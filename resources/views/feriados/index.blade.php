@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="display-6 text-center mt-2 p-0 text-uppercase ">{{__('holidays')}} </h5>
                </div>
                <div class="card-body">
                    <!-- @include('partials.success') -->
                    <div class="row">
                        <div class="col">
                            @can('feriados.create')
                            <a href="{{route('feriados.create')}} " class="btn btn-primary my-2 float-left"
                                title="{{__('add register')}} "><i class="fa fa-plus-circle" aria-hidden="true"></i>
                                {{__('new record')}} </a>
                            @endcan
                        </div>
                        <div class="col">

                        </div>
                    </div>
                    <div class="card-body">
                        @include('partials.success')

                        <table class="table">
                            <thead>
                                <tr>
                                    <th width="10%">{{__('ID')}}</th>
                                    <th width="30%" class="text-capitalize">{{__('fecha')}}</th>
                                    <th width="40%">{{__('feriado')}}</th>

                                    <th width="20%" class="text-center text-capitalize">{{__('actions')}} </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($feriados as $feriado )
                                <tr>
                                    <td scope="row" class="text-capitalize">{{$feriado->id}} </td>

                                    <td scope="row" class="text-capitalize">{{fecha($feriado->fecha)}} </td>
                                    <td>
                                        {{$feriado->name}}</td>
                                    <td>
                                        @can('feriados.edit')
                                        <a href="{{route('feriados.edit',$feriado->id)}}"
                                            class="btn btn-outline-success text-capitalize" data-toggle="tooltip"
                                            data-placement="top" title="{{__('edit record')}} ">
                                            <i class="fa fa-wrench" aria-hidden="true"></i>
                                        </a>
                                        @endcan
                                        @can('feriados.destroy')
                                        <a class="btn btn-outline-danger text-capitalize" href="#" onclick="event.preventDefault();
                                                     document.getElementById({{$feriado->id}}).submit();"
                                            data-toggle="tooltip" data-placement="top" title="{{__('delete record')}} ">

                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>

                                        <form id="{{$feriado->id}}" action="{{route('feriados.destroy',$feriado->id)}}"
                                            method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>


                        </table>

                    </div>
                    <div class="card-footer text-muted  cxy ">
                        <p class="text-center">
                            {{$feriados->render()}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            $(() => {
                $(function () {
                    $('[data-toggle="tooltip"]').tooltip()
                });
            });
        });

    </script>
    @endsection
