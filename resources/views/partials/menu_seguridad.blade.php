<li class="nav-item dropdown">
    @can('roles.index|permissions.index')
    <a class="nav-link dropdown-toggle text-capitalize" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
     {{__('security')}}
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
     @can('rolex.index')
      <a class="dropdown-item text-capitalize" href="{{route('roles.index')}} ">{{__('roles')}}</a>
     @endcan

     @can('permissions.index')
      <a class="dropdown-item text-capitalize" href="{{route('permissions.index')}} ">{{__('permissions')}}</a>
      @endcan
    </div>
    @endcan
  </li>
