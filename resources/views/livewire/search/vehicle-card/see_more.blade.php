
<div class="modal fade bs-example-modal-lg show" tabindex="-1" aria-labelledby="myModal" style="display: block; padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header modal-ver-mas-fondo-encabezado">
                <h5 class="modal-title mt-0" id="myModal"> {{ $vehicle->model_year }} {{ $vehicle->make }}  {{ $vehicle->model }}</h5>
                <button type="button"
                        wire:click.prevent="$toggle('show_more')"
                        class="btn-close"
                        data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="card h-100">
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
                        <p class="vehicle-alignleft">
                            <button wire:click.prevent="$toggle('show_more')"
                                    class="btn btn-dark">
                                    <b>{{ __('See more') }}</b>
                            </button>
                        </p>
                        <p class="vehicle-precio">
                            @if($vehicle->show_price() && $vehicle->price)
                                ${{number_format($vehicle->price, 0, '.', ',') }}
                            @endif
                        </p>
                    </div>

                </div>


            </div>

        </div>
    </div>
</div>
