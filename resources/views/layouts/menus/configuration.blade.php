
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


</ul>
