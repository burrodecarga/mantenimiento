<li class="nav-item dropdown">
    @canany(['teams.index','userzonas.index','userfallas.index','fallas.index','teamplans.index','teamfallas.index'])

    <a class="nav-link dropdown-toggle text-capitalize" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{__('general operation')}}
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        @can('teams.index')
        <a class="dropdown-item text-capitalize" href="{{route('teams.index')}} ">{{__('task teams')}}</a>
        <div class="dropdown-divider"></div>
        @endcan

        @can('userzonas.index')
        <a class="dropdown-item text-capitalize" href="{{route('userzonas.index')}} ">{{__('zonas de operaciones')}} </a>
        <div class="dropdown-divider"></div>
        @endcan

        @can('userfallas.index')

         <a class="dropdown-item text-capitalize" href="{{route('userfallas.index')}} ">{{__('listado de fallas')}} </a>
         <div class="dropdown-divider"></div>
          @endcan

        @can('fallas.index')
         <a class="dropdown-item text-capitalize" href="{{route('fallas.index')}} ">{{__('correción de fallas')}} </a>
        @endcan

        @can('teamfallas.index')
             <a class="dropdown-item text-capitalize" href="{{route('teamfallas.index')}} ">{{__('fault attention')}} </a>
        @endcan

        @hasanyrole('gerente-mantenimiento|super-admin|planificador|team')
        @endrole
    </div>
    @endcan
</li>
