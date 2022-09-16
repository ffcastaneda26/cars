@if(App::isLocale('en'))
    <button class="btn btn-outline-info waves-effect waves-light" title="Change Languaje">
        <a href="/language/es">{{__('Spanish')}}</a>
    </button>
@else
    <button class="btn btn-outline-success waves-effect waves-light" title="Cambiar Lenguaje">
        <a href="/language/en">{{__('English')}}</a>
    </button>
@endif