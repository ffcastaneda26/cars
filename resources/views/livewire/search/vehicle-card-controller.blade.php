<div>
    <div class="card h-100" style="width: 18rem;">
        <!-- Carrusel de fotos del Vehiculo-->

        @include('livewire.search.show-carrousel-images')

        {{-- Ícono Favoritos --}}

        @if($vehicle->add_favorites())
            @include('livewire.search.show-vehicles-icon-favorite')
        @endif

        <div class="card-body">
            <h5 class="card-title">{{ $vehicle->make }} - {{ $vehicle->model_year }} - {{ $vehicle->model }}</h5>

            <h6 class="card-subtitle mb-2 text-muted">
                @if($vehicle->body)
                    {{ $vehicle->body }}
                @endif
            </h6>
            @if($vehicle->miles_from)
            <p class="card-text">{{number_format($vehicle->miles_from, 0, '.', ',') . ' ' . __('Miles')}} </p>
            @endif

            <div class="vehicle-etiquetas">

                <ul class="list-group list-group-flush">
                        <ul class="list-group list-group-flush">
                            @if($vehicle->show_tags() )
                                @foreach($vehicle->location->dealer->tags as $dealer_tag)
                                    <li class="list-group-item text-bg-warning p-1">
                                        {{ App::isLocale('en') ? $dealer_tag->english : $dealer_tag->spanish }}
                                    </li>
                                @endforeach
                            @endif

                        </ul>

                </ul>
            </div>
        </div>
        <div class="card-footer text-muted">
            <p class="vehicle-alignleft"><a href="#" class="btn btn-dark"><b>{{ __('More Information') }}</b></a></p>
            <p class="vehicle-precio">
                @if($vehicle->show_price())
                    {{number_format($vehicle->price, 0, '.', ',') }}
                @endif
            </p>

        </div>
    </div>
</div>
