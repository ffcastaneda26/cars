<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            @include('layouts.home.logo')

        </div>

        <div class="d-flex">
            @yield('main_title')
        </div>
        <div class="d-flex">


            <!-- Cambio de idioma -->
            @if(env('APP_MULTI_LANGUAGE',false))
                @include('layouts.home.change_language')
            @endif

            {{--  Profile / Logout  --}}
            @auth
                @include('layouts.home.profile_logout')
            {{--  @else
                <button class="btn btn-xs"
                        title="{{ __('Log in') }}"
                        style="top: 15px">
                    <a href="{{ route('login') }}">{{ __('Log in') }}</a>
                </button>  --}}
            @endauth

        </div>

    </div>
</header>
