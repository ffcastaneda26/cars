
    @if(Auth::user()->dealers->count() > 0 )
        {{-- Sucursales --}}
        <li>
            <a href="{{route('my-locations')}}" class="waves-effect">
                <i class="mdi mdi-google-maps"></i>
                <span> {{__('Locations')}} </span>
                </a>
        </li>

        {{-- Vehículos --}}
        @if(Auth::user()->locations->count() > 0 )
            <li>
                <a href="{{route('my-vehicles')}}" class="waves-effect">
                    <i class="mdi mdi-car-arrow-left"></i>
                    <span> {{__('Vehicles')}} </span>
                    </a>
            </li>
        @endif

        {{-- Etiquetas --}}
        @if(Auth::user()->dealers->first()->package->max_tags_higlights)
            <li>
                <a href="{{route('my-tags')}}" class="waves-effect">
                    <i class="mdi mdi-label-multiple"></i>
                    <span> {{__('Tags')}} </span>
                    </a>
            </li>
        @endif

    @endif




