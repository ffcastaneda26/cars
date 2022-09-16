
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

    <li>
        <a href="{{route('permission')}}" class="waves-effect">
            <i class="mdi mdi-calendar-check"></i>
            <span>{{__('Permissions')}}</span>
        </a>
    </li>

    {{-- Estados --}}
    <li>
        <a href="{{route('statuses')}}" class="waves-effect">
            <i class="mdi mdi-list-status"></i>
            <span>{{__('Statuses')}}</span>
        </a>
    </li>


     {{-- Estados Permitidos a un estado --}}
    <li>
        <a href="{{route('allow-statuses')}}" class="waves-effect">
            <i class="mdi mdi-beaker-check"></i>
            <span>{{__('Allow Statuses')}}</span>
        </a>
    </li>

    <li>
        <a href="{{route('group-statuses')}}" class="waves-effect">
            <i class="mdi mdi-select-multiple"></i>
            <span>{{__('Group Statuses')}}</span>
        </a>
    </li>

    {{-- Estados x Grupo --}}
    <li>
        <a href="{{route('statuses-by-group')}}" class="waves-effect">
            <i class="mdi mdi-arrow-expand-vertical"></i>
            <span>{{__('Statuses By Group')}}</span>
        </a>
    </li>

    {{-- Acciones de Proyecto --}}
    <li>
        <a href="{{route('actions-projects')}}" class="waves-effect">
            <i class="mdi mdi-car-tire-alert"></i>
            <span>{{__('Actions Project')}}</span>
        </a>
    </li>


    {{-- Industrias --}}
    <li>
        <a href="{{route('industries')}}" class="waves-effect">
            <i class="fas fa-industry"></i>
            <span>{{__('Industries')}}</span>
        </a>
    </li>

    {{-- Sentimientos --}}
    {{-- <li>
        <a href="{{route('feelings')}}" class="waves-effect">
            <i class="mdi mdi-cards-heart"></i>
            <span>{{__('Feelings')}}</span>
        </a>
    </li> --}}


    {{-- Audiencias --}}
    {{-- <li>
        <a href="{{route('audiences')}}" class="waves-effect">
            <i class="fas fa-people-carry"></i>
            <span>{{__('Audiences')}}</span>
        </a>
    </li> --}}

    {{-- Idiomas --}}
    <li>
        <a href="{{route('languages')}}" class="waves-effect">
            <i class="fas fa-language"></i>
            <span>{{__('Languages')}}</span>
        </a>
    </li>


    {{-- Diesños --}}
    <li>
        <a href="{{route('designs')}}" class="waves-effect">
            <i class="mdi mdi-material-design"></i>
            <span>{{__('Designs')}}</span>
        </a>
    </li>


    <li>
        <a href="{{route('packages')}}" class="waves-effect">
            <i class="mdi mdi-package-variant"></i>
            <span>{{__('Packages')}}</span>
        </a>
    </li>

    {{-- Membresías --}}
    <li>
        <a href="{{route('memberships')}}" class="waves-effect">
            <i class="mdi mdi-arrow-decision-auto"></i>
            <span>{{__('Memberships')}}</span>
        </a>
    </li>

    {{-- Paquetes x Membresía --}}

    <li>
        <a href="{{route('membership-packages')}}" class="waves-effect">
            <i class="mdi mdi-spin mdi-archive-arrow-up"></i>
            <span>{{__('Packages by Membership')}}</span>
        </a>
    </li>

    {{-- Diseños x Paquete --}}


    <li>
        <a href="{{route('package-designs')}}" class="waves-effect">
            <i class="mdi mdi-spin mdi-star"></i>
            <span>{{__('Designs by Package')}}</span>
        </a>
    </li>


    <li>
        <a href="{{route('payment-methods')}}" class="waves-effect">
            <i class="mdi mdi-credit-card-multiple"></i>
            <span>{{__('Payment Methods')}}</span>
        </a>
    </li>

    <li>
        <a href="{{route('suscriptions')}}" class="waves-effect">
            <i class="mdi mdi-card-account-details-star-outline"></i>
            <span>{{__('Suscriptions')}}</span>
        </a>
    </li>

    <li>
        <a href="{{route('accounts')}}" class="waves-effect">
            <i class="mdi mdi-shield-account"></i>
            <span>{{__('Accounts')}}</span>
        </a>
    </li>

</ul>


<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <i class="mdi mdi-reflect-horizontal"></i>
        <span>{{__('Projects')}}</span>
    </a>
    <ul class="sub-menu mm-collapse" aria-expanded="false">
        <li>
            <a href="{{route('project-designers')}}" class="waves-effect">
                <i class="mdi mdi-drama-masks"></i>
                <span>{{__('Project Designers')}}</span>
            </a>
        </li>
    </ul>
</li>

