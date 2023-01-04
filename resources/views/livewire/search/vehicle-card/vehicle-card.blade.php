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
                <h5 class="card-title"> {{ $vehicle->model_year }} {{ $vehicle->make }}  {{ $vehicle->model }}</h5>
            </div>


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
                        @foreach($vehicle->read_tags_to_show(env('APP_MAX_TAGS_TO_SHOW',1)) as $dealer_tag)
                            <li class="list-group-item estilo-cuervo p-1">
                                {{ App::isLocale('en') ? $dealer_tag->english : $dealer_tag->spanish }}
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>

        </div>

        <div class="card-footer text-muted">
            <div class="d-flex justify-content-between align-items-start">
                <p class="vehicle-alignleft">
                       <x-jet-button class="btn boton-cuervo waves-effect">
                        <a href="{{ url('vehicle-details') .'/' . $vehicle->id }}" class=" text-white">{{ __('See more') }}</a>
                    </x-jet-button>
                </p>
                <p class="vehicle-precio">
                    @if($vehicle->show_price() && $vehicle->price)
                        ${{number_format($vehicle->price, 0, '.', ',') }}
                    @else
                        {{ __('Call for Price') }}
                    @endif
                </p>
            </div>

        </div>


    </div>

    @if($show_more )
        @include('livewire.search.vehicle-card.see_more')
    @endif


</div>
