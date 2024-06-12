@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="display-6 text-center mt-2 p-0 text-uppercase ">{{__('list of').' '.__($title)}} </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <a href="{{route('equipos.create')}} " class="btn btn-primary my-2 float-left" title="{{__('add register')}} "><i class="fa fa-plus-circle" aria-hidden="true"></i> {{__('new record')}} </a>
                        </div>
                        <div class="col">
                            <form class="form-inline my-2 my-lg-0 float-right">
                                @csrf @method('post')
                                <input class="form-control mr-sm-2" type="search" name="search" placeholder="{{__('search')}}" aria-label="Search">
                                <button class="btn btn-outline-success my-2 my-sm-0 text-capitalize" type="submit">{{__('search')}} </button>
                            </form>
                            <a href="{{route('equipos.formImportExcel')}}" class="btn btn-primary"><i class="fa fa-download" aria-hidden="true"></i> </a>
                        </div>
                    </div>
                <div class="card-body">
                     @include('partials.success')

                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-capitalize">{{__('equipo')}}</th>
                                <th>{{__('description')}}</th>

                                <th width="200px" class="text-center text-capitalize">{{__('actions')}} </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($equipos as $equipo )
                            <tr>
                                <td scope="row" class="text-capitalize">{{$equipo->name}} </td>
                                <td>{{$equipo->sistema}}<hr>{{$equipo->description}}</td>
                                <td width="200px">
                                    <a href="#" class="btn btn-outline-primary text-capitalize" data-toggle="tooltip" data-placement="top"
                                    title="{{__('make sistema')}} ">

                                        <i class="fa fa-list" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{route('equipos.edit',$equipo->id)}}" class="btn btn-outline-success text-capitalize" data-toggle="tooltip" data-placement="top"
                                    title="{{__('edit record')}} ">

                                        <i class="fa fa-wrench" aria-hidden="true"></i>
                                    </a>

                                    <a class="btn btn-outline-danger text-capitalize" href="#" onclick="event.preventDefault();
                                                     document.getElementById('delete-form').submit();" data-toggle="tooltip" data-placement="top"
                                                     title="{{__('delete record')}} ">

                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>

                                    <form id="delete-form" action="{{route('equipos.destroy',$equipo->id)}}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>


                                </td>
                            </tr>
                            @endforeach
                        </tbody>


                    </table>

                </div>
                 <div class="card-footer text-muted  cxy ">
                      <p class="text-center">
                         {{$equipos->render()}}
                      </p>
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>

document.addEventListener('DOMContentLoaded', function() {
	$(() => {
        $(function () {
        $('[data-toggle="tooltip"]').tooltip()
        });
    });
});

    </script>
@endsection

