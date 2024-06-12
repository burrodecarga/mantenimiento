<li class="nav-item dropdown">
    @canany(['plans.index','teamplans.index'])
    <a class="nav-link dropdown-toggle text-capitalize" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{__('general planning')}}
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        @can('plans.index')
        <a class="dropdown-item text-capitalize" href="{{route('plans.index')}} ">{{__('maintenance plans')}} </a>
        @endcan

        @can('teamplans.index')
          <div class="dropdown-divider"></div>
          <a class="dropdown-item text-capitalize" href="{{route('teamplans.index')}} ">{{__('Asignación de Equipo a Tarea')}} </a>
        @endcan

        @can('calendarios.index')
        <div class="dropdown-divider"></div>
        <a class="dropdown-item text-capitalize" href="{{route('calendarios.index')}} ">{{__('Calendario de tareas')}} </a>
       @endcan

      @can('calendarios.index')
       <div class="dropdown-divider"></div>
       <a class="dropdown-item text-capitalize" href="{{route('agenda.index')}} ">{{__('Agenda de tareas')}} </a>
      @endcan

      @can('estadisticas.index')
       <div class="dropdown-divider"></div>
       <a class="dropdown-item text-capitalize" href="{{route('estadisticas.graficoLineal')}} ">{{__('Estadisticas Operacionales')}} </a>
      @endcan

      @can('estadisticas.index')
       <div class="dropdown-divider"></div>
       <a class="dropdown-item text-capitalize" href="{{route('estadisticas.graficoBarras')}} ">{{__('Estadisticas Barras ')}} </a>
      @endcan



    </div>
@endcan
</li>
