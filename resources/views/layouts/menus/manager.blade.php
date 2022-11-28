    {{-- Empresas --}}
    <li>
        <a href="{{route('my-companies')}}" class="waves-effect">
            <i class="mdi mdi-office-building"></i>
            <span> {{__('Companies')}} </span>
        </a>
    </li>

    {{-- Vacantes --}}
    {{-- TODO: Habilitar menú de "jobs" solo si el usuario tiene empresa asociada --}}
    @if(Auth::user()->has('companies'))
        <li>
            <a href="{{route('my-jobs')}}" class="waves-effect">
                <i class="mdi mdi-alpha-j-circle"></i>
                <span> {{__('Jobs')}} </span>
            </a>
        </li>
    @endif

