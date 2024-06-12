<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle text-capitalize" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{__('general operation')}}
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item text-capitalize" href="{{route('userzonas.index')}} ">{{__('Asignación de zonas')}} </a>
        <a class="dropdown-item text-capitalize" href="{{route('userfallas.index')}} ">{{__('Reporte de fallas')}} </a>
        <a class="dropdown-item text-capitalize" href="{{route('fallas.index')}} ">{{__('Control de fallas')}} </a>
        <a class="dropdown-item text-capitalize" href="{{route('teamfallas.index')}} ">{{__('Atención de fallas')}} </a>
        <a class="dropdown-item text-capitalize" href="{{route('teamplans.index')}} ">{{__('Planes de Mantenimiento')}} </a>

    </div>
</li>
