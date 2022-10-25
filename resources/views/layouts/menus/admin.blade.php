
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
        <a href="{{route('role')}}" class="waves-effect">
            <i class="mdi mdi-cube-outline"></i>
            <span> {{__('Roles')}} </span>
        </a>
    </li>
    {{-- Permisos x Rol --}}
    <li>
        <a href="{{route('role-permission')}}" class="waves-effect">
            <i class="mdi mdi-account-check-outline"></i>
            <span>{{__('Permissions by Role')}}</span>
        </a>
    </li>

    {{-- Permisos --}}
    <li>
        <a href="{{route('permission')}}" class="waves-effect">
            <i class="mdi mdi-calendar-check"></i>
            <span>{{__('Permissions')}}</span>
        </a>
    </li>

    {{-- Estados de Registros --}}
    <li>
        <a href="{{route('statuses')}}" class="waves-effect">
            <i class="mdi mdi-list-status"></i>
            <span>{{__('Statuses')}}</span>
        </a>
    </li>

    {{-- Géneros --}}
    <li>
        <a href="{{route('genders')}}" class="waves-effect">
            <i class="mdi mdi-gender-transgender"></i>
            <span>{{__('Genders')}}</span>
        </a>
    </li>
    {{-- Empresas --}}
    <li>
        <a href="{{route('companies')}}" class="waves-effect">
            <i class="mdi mdi-account-box"></i>
            <span> {{__('Companies')}} </span>
            </a>
    </li>
</ul>
