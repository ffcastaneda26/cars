
<a href="javascript: void(0);" class="has-arrow waves-effect">
    <i class="mdi mdi-buffer"></i>
    <span> {{__('Configuration')}}</span>
</a>

<ul class="sub-menu" aria-expanded="false">
    <li>
        <a href="{{route('users')}}" class="waves-effect">
            <i class="mdi mdi-account-box"></i>
            <span> {{__('Users')}} </span>
            </a>
    </li>

    <li>
        <a href="{{route('roles')}}" class="waves-effect">
            <i class="mdi mdi-cube-outline"></i>
            <span> {{__('Roles')}} </span>
        </a>
    </li>


    {{-- Permisos --}}
    <li>
        <a href="{{route('permissions')}}" class="waves-effect">
            <i class="mdi mdi-calendar-check"></i>
            <span>{{__('Permissions')}}</span>
        </a>
    </li>


    {{-- Permisos x Rol --}}
    <li>
        <a href="{{route('role-permission')}}" class="waves-effect">
            <i class="mdi mdi-account-check-outline"></i>
            <span>{{__('Permissions Role')}}</span>
        </a>
    </li>

    {{-- Marcas --}}
    <li>
        <a href="{{route('makes')}}" class="waves-effect">
            <i class="mdi  mdi-airballoon-outline"></i>
            <span> {{__('Makes')}} </span>
        </a>
    </li>

    {{-- Modelos --}}
    <li>
        <a href="{{route('models')}}" class="waves-effect">
            <i class="mdi mdi-dump-truck"></i>
            <span> {{__('Models')}} </span>
        </a>
    </li>


    {{-- Estilos --}}
    <li>
        <a href="{{route('styles')}}" class="waves-effect">
            <i class="mdi mdi-alpha-s-box"></i>
            <span> {{__('Styles')}} </span>
        </a>
    </li>


    {{-- Distribuidores --}}
    <li>
        <a href="{{route('dealers')}}" class="waves-effect">
            <i class="mdi mdi-car-connected"></i>
            <span> {{__('Dealers')}} </span>
        </a>
    </li>

    {{-- Vehiculos --}}
    <li>
        <a href="{{route('vehicles')}}" class="waves-effect">
            <i class="mdi mdi-car"></i>
            <span> {{__('Vehicles')}} </span>
        </a>
    </li>


    {{-- Prospectos --}}
    <li>
        <a href="{{route('leads')}}" class="waves-effect">
            <i class="mdi mdi-account-supervisor-circle"></i>
            <span> {{__('Leads')}} </span>
        </a>
    </li>

    {{-- Requerimientos --}}
    <li>
        <a href="{{route('requirements')}}" class="waves-effect">
            <i class="mdi mdi-car-side"></i>
            <span> {{__('Requirements')}} </span>
        </a>
    </li>

</ul>
