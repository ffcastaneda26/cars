
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

    <li>
        <a href="{{route('companies')}}" class="waves-effect">
            <i class="fas fa-building"></i>
            <span>{{__('Companies')}}</span>
        </a>
    </li>

    <li>
        <a href="{{route('teams')}}" class="waves-effect">
            <i class="mdi mdi-microsoft-teams"></i>
            <span>{{__('Teams')}}</span>
        </a>
    </li>


    <li>
        <a href="{{route('rounds')}}" class="waves-effect">
            <i class="mdi mdi-calendar-month"></i>
            <span>{{__('Rounds')}}</span>
        </a>
    </li>

    <li>
        <a href="{{route('games')}}" class="waves-effect">
            <button class="icon subtle" 
                style="--button-padding:var(--spacing-xl) var(--spacing-sm) var(--spacing-md) var(--spacing-sm); --button-background:var(--white); --button-hover-background:var(--fa-yellow); --button-color:var(--fa-md-gravy); --button-hover-color:var(--fa-navy); width: 100%; height: 100%; --button-font-weight:var(--font-weight-normal); --button-margin-bottom:0;">
                <i class="fa-regular fa-futbol fa-fw" style="color: var(--fa-navy);"></i>
                 <span class="icon-name">{{__('Games')}}</span>
            </button>
        {{-- <i class="fa-regular fa-futbol fa-fw"></i>
        <span>{{__('Games')}}</span> --}}


        </a>
    </li>

</ul>
