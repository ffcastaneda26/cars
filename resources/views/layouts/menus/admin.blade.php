
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
            <i class="mdi mdi-office-building"></i>
            <span> {{__('Companies')}} </span>
        </a>
    </li>


    {{-- Nacionalidades --}}
    <li>
        <a href="{{route('nationalities')}}" class="waves-effect">
            <i class="mdi mdi-hail"></i>
            <span> {{__('Nationalities')}} </span>
            </a>
    </li>

    {{-- Tipos de Salario --}}
    <li>
        <a href="{{route('salary-types')}}" class="waves-effect">
            <i class="mdi mdi-cash-usd-outline"></i>
            <span> {{__('Salary Types')}} </span>
            </a>
    </li>


    {{-- Tipos de Tiempo --}}
    <li>
        <a href="{{route('time-types')}}" class="waves-effect">
            <i class="mdi mdi-timer-sand"></i>
            <span> {{__('Time Types')}} </span>
            </a>
    </li>

    {{-- Tipos de eMPLEO --}}
    <li>
        <a href="{{route('job-types')}}" class="waves-effect">
            <i class="mdi mdi-timer-sand"></i>
            <span> {{__('Job Types')}} </span>
            </a>
    </li>


    {{-- Idiomas --}}
    <li>
        <a href="{{route('languages')}}" class="waves-effect">
            <i class="fas fa-language"></i>
            <span> {{__('Languages')}} </span>
            </a>
    </li>


    {{-- Industrias --}}
    <li>
        <a href="{{route('industries')}}" class="waves-effect">
            <i class="mdi mdi-factory"></i>
            <span> {{__('Industries')}} </span>
            </a>
    </li>

    {{-- Puestos --}}
    <li>
        <a href="{{route('positions')}}" class="waves-effect">
            <i class="mdi mdi-alpha-p-circle-outline"></i>
            <span> {{__('Positions')}} </span>
            </a>
    </li>


    {{-- Escolaridad --}}
    <li>
        <a href="{{route('grades')}}" class="waves-effect">
            <i class="mdi mdi-school"></i>
            <span> {{__('Grades')}} </span>
            </a>
    </li>

    {{-- Tiempos para contratar --}}
    <li>
        <a href="{{route('time-hires')}}" class="waves-effect">
            <i class="mdi mdi-account-convert"></i>
            <span> {{__('Tiempos para Contratar')}} </span>
            </a>
    </li>


</ul>
