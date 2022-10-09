<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            @include('layouts.home.logo')
            <!-- Botón contraer barra lateral -->
            @include('layouts.home.button_show_hide_lateral_menu')

        </div>
        <div class="d-flex">
            @yield('main_title')

        </div>
        <div class="d-flex">
            <!-- Cambio de idioma -->
            @include('layouts.home.change_language')

            {{--  Profile / Logout  --}}
            @include('layouts.home.profile_logout')

        </div>

    </div>
</header>
