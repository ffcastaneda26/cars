<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            @include('layouts.home.logo')
            <!-- Botón contraer barra lateral -->
            @include('layouts.home.button_show_hide_lateral_menu')

           @yield('main_title')
        </div>


           <div class="">
                <img src="{{asset('images/logo.png')}}" alt="" class="w-auto p-2" height="60x">
           </div>
            <div class="d-flex">
                <!-- Cambio de idioma -->
                @include('layouts.home.change_language')

                {{--  Profile / Logout  --}}
                @include('layouts.home.profile_logout')

            </div>

    </div>
</header>
