
<div class="dropdown d-none d-lg-inline-block me-2">
    @if(App::isLocale('en'))
        <button type="button" class="btn header-item noti-icon waves-effect" title="Cambiar a Español">
            <a href="/language/es" class="dropdown-item notify-item">
                <img src="{{asset('images/mexico.png')}}" alt="user-image" height="25">
            </a>
        </button>
    @else
        <button type="button" class="btn header-item noti-icon waves-effect" title="Change to English">
            <a href="/language/en" class="dropdown-item notify-item">
                <img src="{{asset('images/usa.png')}}" alt="user-image" height="25">
            </a>
        </button>
    @endif
</div>
