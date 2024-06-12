<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle text-capitalize" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{__('general administration')}}
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item text-capitalize" href="{{route('sistemas.index')}} ">{{__('sistemas')}} </a>
        <a class="dropdown-item text-capitalize" href="{{route('subsistemas.index')}} ">{{__('subsistemas')}} </a>
        <a class="dropdown-item text-capitalize" href="{{route('equipos.index')}} ">{{__('equipos')}} </a>
        <a class="dropdown-item text-capitalize" href="{{route('tipos.index')}} ">{{__('type of equipment')}} </a>
        <a class="dropdown-item text-capitalize" href="{{route('parametros.index')}} ">{{__('parametros')}} </a>
        <a class="dropdown-item text-capitalize" href="{{route('equipos.formImportExcelAll')}} ">{{__('Importar Todo')}} </a>
        <a class="dropdown-item text-capitalize" href="{{route('protocolos.index')}} ">{{__('protocolos')}} </a>
        <a class="dropdown-item text-capitalize" href="{{route('insumos.index')}} ">{{__('Insumos')}} </a>
        <a class="dropdown-item text-capitalize" href="{{route('herramientas.index')}} ">{{__('herramientas')}} </a>
        <a class="dropdown-item text-capitalize" href="{{route('servicios.index')}} ">{{__('servicios')}} </a>
        <a class="dropdown-item text-capitalize" href="{{route('repuestos.index')}} ">{{__('repuestos')}} </a>
        <a class="dropdown-item text-capitalize" href="{{route('feriados.index')}} ">{{__('feriados')}} </a>
        <a class="dropdown-item text-capitalize" href="{{route('plans.index')}} ">{{__('Planes de Mantenimiento')}} </a>

    </div>
</li>
