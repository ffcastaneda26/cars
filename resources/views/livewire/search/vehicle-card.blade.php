<div>
    <div class="card h-100" style="width: 18rem;">
        <!-- Carrusel de fotos del Vehiculo-->
        @if($vehicle->photos->count())
            @include('livewire.search.show-carrousel-images')
        @else
            <img src="{{ asset('images/NoPhotos.jpg') }}" alt="NO TIENE FOTO">
        @endif

        <div class="card-body">
            <div class="card-title">
                <h5>
                    {{  $vehicle->path }}
                </h5>
            </div>
            <h5 class="card-title"> {{ $vehicle->model_year }} {{ $vehicle->make }}  {{ $vehicle->model }}</h5>

            <h6 class="card-subtitle mb-2 text-muted">
                @if($vehicle->body)
                    {{ $vehicle->body }}
                @endif
            </h6>

            <div class="d-flex justify-content-between align-items-start">
                @if($vehicle->miles)
                    <p class="card-text">{{number_format($vehicle->miles, 0, '.', ',') . ' ' . __('Miles')}} </p>
                @else
                    <div></div>
                @endif

                {{-- Ícono Favoritos --}}

                @if($vehicle->add_favorites())
                    @livewire('vehicle-favorite',['vehicle' => $vehicle],key($vehicle->id))
                @endif

            </div>




            <div class="vehicle-etiquetas">
                <ul class="list-group list-group-flush">
                    @if($vehicle->show_tags() )
                        @foreach($vehicle->location->dealer->tags as $dealer_tag)
                            <li class="list-group-item text-bg-warning p-1">
                                {{ App::isLocale('en') ? $dealer_tag->english : $dealer_tag->spanish }}
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>

        </div>
        <div class="card-footer text-muted">
            <div class="d-flex justify-content-between align-items-start">
                <p class="vehicle-alignleft"><a href="#" class="btn btn-dark"><b>{{ __('See more') }}</b></a></p>
                <p class="vehicle-precio">
                    @if($vehicle->show_price() && $vehicle->price)
                        ${{number_format($vehicle->price, 0, '.', ',') }}
                    @endif
                </p>
            </div>

        </div>


    </div>
</div>