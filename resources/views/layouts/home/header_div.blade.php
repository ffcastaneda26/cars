<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            @include('layouts.home.logo')
            <!-- Botón contraer barra lateral -->
            @include('layouts.home.button_show_hide_lateral_menu')

           @yield('main_title')
        </div>

        <div class="d-flex">
            <!-- Cambio de idioma -->
            <div class="d-flex">
                <div class="dropdown d-none d-lg-inline-block me-2">
                    <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                        <i class="mdi mdi-fullscreen"></i>
                    </button>
                </div>
                <div class="dropdown d-none d-md-block me-2">
                    <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if(App::isLocale('en'))
                            <span class="font-size-16 font-extrabold">{{__('Cambiar Idioma')}}</span>
                        @else
                            <span class="font-size-16 font-extrabold">{{__('Change Languaje')}}</span>
                        @endif
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a href="/language/en" class="dropdown-item notify-item">
                            <img src="{{asset('images/usa.png')}}" alt="user-image" height="12">
                            <span class="align-middle">{{__('English')}} </span>
                        </a>
                        <!-- item-->
                        <a href="/language/es" class="dropdown-item notify-item">
                            <img src="{{asset('images/mexico.png')}}" alt="user-image" height="12">
                            <span class="align-middle">{{__('Español')}} </span>
                        </a>
                    </div>
                </div>

                {{--  Profile / Logout  --}}
                <div class="dropdown d-inline-block">
                    <button type="button"
                    class="btn header-item waves-effect"
                    id="page-header-user-dropdown"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false">
                        @if (Auth::user()->profile_photo_path)
                            <img width="32" height="32" class="rounded-circle object-cover" src="/storage/{{Auth::user()->profile_photo_path }}" alt="{{ Auth::user()->name }}" />
                        @else
                            <img width="32" height="32" class="rounded-circle object-cover" src="{{Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        @endif
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        @if(!Auth::user()->update_account && !Auth::user()->change_password)
                            <a class="dropdown-item" href="{{ route('profile.show') }}"> {{ __('Profile') }}</a>
                        @endif

                        <div class="dropdown-divider"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-jet-dropdown-link>
                        </form>
                    </div>
                </div>

                {{--  Boton para los settings de ajax
                    <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                        <i class="mdi mdi-spin mdi-cog"></i>
                    </button>
                </div>  --}}
            </div>
        </div>
    </div>
</header>
