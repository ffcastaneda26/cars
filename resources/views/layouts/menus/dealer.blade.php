    {{-- Usuarios --}}
    <li>
        <a href="{{route('my-users')}}" class="waves-effect">
            <i class="mdi mdi-account-box"></i>
            <span> {{__('Users')}} </span>
            </a>
    </li>

    {{-- Sucursales --}}
    <li>
        <a href="{{route('my-locations')}}" class="waves-effect">
            <i class="mdi mdi-google-maps"></i>
            <span> {{__('Locations')}} </span>
            </a>
    </li>

      {{-- Vehículos --}}
      <li>
        <a href="{{route('my-vehicles')}}" class="waves-effect">
            <i class="mdi mdi-car-arrow-left"></i>
            <span> {{__('Vehicles')}} </span>
            </a>
    </li>

