
   <ul class="navbar-nav ml-auto">
        @role('super-admin|gerente-mantenimiento')
             @include('partials.menu_seguridad')
        @endrole
        {{-- @hasanyrole('admin|super-admin|operador-zona|operador-equipo|tecnico-mantenimiento|jefe-mantenimiento|jefe-supervisores|supervisor|gerente-mantenimiento') --}}
            @include('partials.menu_estructura')
            @include('partials.menu_admin')
            @include('partials.menu_operacion')
        {{-- @endrole --}}
            @include('partials.menu_planificacion')
    </li>

    </ul>
