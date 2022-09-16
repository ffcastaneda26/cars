
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
    {{-- <li>
        <a href="{{route('statuses')}}" class="waves-effect">
            <i class="mdi mdi-list-status"></i>
            <span>{{__('Statuses')}}</span>
        </a>
    </li> --}}

    {{-- Promociones --}}
    <li>
        <a href="{{route('promotions')}}" class="waves-effect">
            <i class="mdi mdi-spin mdi-klingon"></i>
            <span>{{__('Promotions')}}</span>
        </a>
    </li>


    {{-- Regalos --}}
    <li>
        <a href="{{route('gifts')}}" class="waves-effect">
            <i class="mdi mdi-gift"></i>
            <span>{{__('Gifts')}}</span>
        </a>
    </li>


</ul>
