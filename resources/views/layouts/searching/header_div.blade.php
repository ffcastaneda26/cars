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
            <!-- Favoritos-->
            @auth
                @if(Auth::user()->favorites->count())
                    @livewire('show-favorites')
                @endif
            @endauth
            <!-- Cambio de idioma -->
            @if(env('APP_MULTI_LANGUAGE',false))
                @include('layouts.home.change_language')
            @endif

            {{--  Profile / Logout  --}}
            @auth
                @include('layouts.home.profile_logout')
            @endauth

        </div>

    </div>
</header>
