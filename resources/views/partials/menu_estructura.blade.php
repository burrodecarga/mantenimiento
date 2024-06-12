<li class="nav-item dropdown">
    @canany(['sistemas.index','subsistemas.index','equipos.index','tipos.index','parametros.index','protocolos.index'])
    <a class="nav-link dropdown-toggle text-capitalize" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{__('general structure')}}
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        @can('sistemas.index')
        <a class="dropdown-item text-capitalize" href="{{route('sistemas.index')}} ">{{__('sistemas')}} </a>
        @endcan

        @can('subsistemas.index')
        <a class="dropdown-item text-capitalize" href="{{route('subsistemas.index')}} ">{{__('subsistemas')}} </a>
        @endcan

        @can('equipos.index')
        <a class="dropdown-item text-capitalize" href="{{route('equipos.index')}} ">{{__('equipments')}} </a>
        <div class="dropdown-divider"></div>
        @endcan

        @can('equipos.index')
        <a class="dropdown-item text-capitalize" href="{{route('equipos.indexNew')}} ">{{__('equipos  vía ajax')}} </a>
        <div class="dropdown-divider"></div>
        @endcan

        @can('sistemas.index')
        <a class="dropdown-item text-capitalize" href="{{route('zonas.index')}} ">{{__('zonas')}} </a>
        <div class="dropdown-divider"></div>
        @endcan

        @can('tipos.index')
        <a class="dropdown-item text-capitalize" href="{{route('tipos.index')}} ">{{__('equipments type')}} </a>
        @endcan

        @can('parametros.index')
        <a class="dropdown-item text-capitalize" href="{{route('parametros.index')}} ">{{__('equipments parameter')}} </a>

        @endcan

        @can('protocolos.index')
          <div class="dropdown-divider"></div>
          <a class="dropdown-item text-capitalize" href="{{route('protocolos.index')}} ">{{__('equipment protocols')}} </a>
        @endcan
    </div>
@endcan
</li>
