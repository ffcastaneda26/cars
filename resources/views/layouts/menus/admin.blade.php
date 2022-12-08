
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



    {{-- Colores --}}
    <li>
        <a href="{{route('colors')}}" class="waves-effect">
            <i class="mdi  mdi-palette-outline"></i>
            <span> {{__('Colors')}} </span>
            </a>
    </li>

    {{-- Redes Sociales --}}
    <li>
        <a href="{{route('social-networks')}}" class="waves-effect">
            <i class="mdi mdi-facebook"></i>
            <i class="mdi mdi-instagram"></i>
            <i class="mdi mdi-youtube"></i>
            <span> {{__('Social Networks')}} </span>

        </a>
    </li>

    {{-- Paquetes --}}

    <li>
        <a href="{{route('packages')}}" class="waves-effect">
            <i class="mdi mdi-package-variant"></i>
            <span>{{__('Packages')}}</span>
        </a>
    </li>


    {{-- Distribuidores --}}
    <li>
        <a href="{{route('dealers')}}" class="waves-effect">
            <i class="mdi mdi-car-arrow-right"></i>
            <span> {{__('Dealers')}} </span>
        </a>
    </li>



</ul>
