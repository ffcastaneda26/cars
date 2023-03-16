<header class="background-top-header">
    <div class="d-flex justify-content-between">
        <div class="logo-cars">
            <a href="{{route('vehicle-search')}}" class="logo logo-light">
                <img class="app-logo p-2" src="{{asset('images/logo.png')}}">
            </a>
        </div>

        <div class="d-flex">
            @yield('main_title')
        </div>

        <div class="d-flex justify-content-between">
            <div class="change-language-cars">
                @if(App::isLocale('en'))
                    <button type="button" class="btn header-item noti-icon waves-effect" title="Cambiar a Español">
                        <a href="/language/es" class="dropdown-item notify-item">
                            <img src="{{asset('images/spanish.png')}}" alt="spanish" height="25">
                        </a>
                    </button>
                @else
                    <button type="button" class="btn header-item noti-icon waves-effect" title="Change to English">
                        <a href="/language/en" class="dropdown-item notify-item">
                            <img src="{{asset('images/english.png')}}" alt="english" height="25">
                        </a>
                    </button>
                @endif
            </div>

             {{--  Profile / Logout  --}}
            <div>
                @auth
                    @include('layouts.home.profile_logout')
                @endauth
            </div>
        </div>

    </div>
</header>
