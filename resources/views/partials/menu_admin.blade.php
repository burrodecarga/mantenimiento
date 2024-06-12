<li class="nav-item dropdown">
 @canany(['users.index','herramientas.index','insumos.index','servicios.index','repuestos.index','feriados.index'])

    <a class="nav-link dropdown-toggle text-capitalize" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{__('general administration')}}
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

        @can('users.index')
        <a class="dropdown-item text-capitalize" href="{{route('users.index')}} ">{{__('human resource')}}</a>
        <div class="dropdown-divider"></div>
        @endcan

        @can('herramientas.index')
              <a class="dropdown-item text-capitalize" href="{{route('herramientas.index')}} ">{{__('tools')}} </a>
              <div class="dropdown-divider"></div>
              @endcan

        @can('insumos.index')
            <a class="dropdown-item text-capitalize" href="{{route('insumos.index')}} ">{{__('supplies')}} </a>
            <div class="dropdown-divider"></div>
        @endcan

        @can('repuestos.index')
            <a class="dropdown-item text-capitalize" href="{{route('repuestos.index')}} ">
                {{__('spare parts')}} </a>
        <div class="dropdown-divider"></div>
        @endcan

        @can('servicios.index')
        <a class="dropdown-item text-capitalize" href="{{route('servicios.index')}} ">{{__('services')}} </a>
       <div class="dropdown-divider"></div>
       @endcan

       @can('feriados.index')
       <a class="dropdown-item text-capitalize" href="{{route('feriados.index')}} ">{{__('holidays')}} </a>
       @endcan
    </div>
 @endcan
</li>
