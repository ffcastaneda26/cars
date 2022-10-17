
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

    {{-- Deportes --}}

    <li>
        <a href="{{route('sports')}}" class="waves-effect">
            <i class="mdi mdi-football"></i>
            <span>{{__('Sports')}}</span>
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
            <i class="mdi mdi-soccer-field"></i>
            <span>{{__('Games')}}</span>
        </a>
    </li>


</ul>
