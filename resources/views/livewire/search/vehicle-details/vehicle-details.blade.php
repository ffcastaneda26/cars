<div>
    <div class="row">
        <div class="alinea-derecha">
            <button class="btn btn-dark">
                <a href="{{route('vehicle-search')}}" class="waves-effect" style="none">
                    <span> {{__('Search Vehicles')}} </span>
                </a>
            </button>
        </div>
    </div>
        <!-- Carrusel de fotos del Vehiculo-->
        @if($vehicle->photos->count())
            @include('livewire.search.show-carrousel-images')
        @else
            <img src="{{ asset('images/NoPhotos.jpg') }}" alt="NO TIENE FOTO">
        @endif

        <div class="row">
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
        </div>
        <div class="row">
            <div class="card-footer text-muted">
                <p class="vehicle-alignleft"><a href="#" class="btn btn-dark"><b>Contactar</b></a></p>
                <p class="vehicle-precio">
                    @if($vehicle->show_price() && $vehicle->price)
                        ${{number_format($vehicle->price, 0, '.', ',') }}
                    @endif
                </p>
            </div>
        </div>

        <div class="row"> 
            <div class="card-body"> 
                <div class="row">
                        <div class="col-sm">
                            <p class="text-capitalize"><strong>{{ __('Vin Number') }}</strong></p>
                            <p>{{ $vehicle->vin }}</p>
                            <strong>{{ __('Body') }}</strong>
                            <p>{{ $vehicle->body }}</p>
                            @if($vehicle->drive)
                                <strong>{{ __('Drive') }}</strong>
                                <p>{{ $vehicle->drive }}</p>
                            @endif
                            <strong>{{ __('TRANSMISSION') }}</strong>
                            <p>{{ $vehicle->transmission }}</p>
                            <strong>{{ __('ENGINE') }}</strong>
                            {{-- <p>{{ $vehicle->engine_displacement/1000 }}L</p> --}}
                            
                            <p>{{  number_format(floatval($vehicle->engine_displacement/1000),2) }}L</p>
                            <strong>{{ __('CYLINDERS') }}</strong>
                            <p>{{ $vehicle->engine_cylinders }}</p>
                            <strong>{{ __('FUEL TYPE') }}</strong>
                            <p>{{ $vehicle->fuel_type_primary }}</p>
                            <strong>{{ __('ENGINE POWER HP') }}</strong>
                            <p>{{ $vehicle->engine_power_hp }}</p>
                        </div>

                        <div class="col-sm">
                            <strong>{{ __('EXTERIOR COLOR') }}</strong>
                            <p>{{ App::isLocale('en') ? $vehicle->exterior_color->english : $vehicle->exterior_color->spanish}}</p>
                            <strong>{{ __('INTERIOR COLOR') }}</strong>
                            <p>{{ App::isLocale('en') ? $vehicle->interior_color->english : $vehicle->interior_color->spanish}}</p>

                            <strong>{{ __('INTERIOR MATERIAL') }}</strong>
                            <p>{{ App::isLocale('en') ? $vehicle->material->english : $vehicle->material->spanish}}</p>

                            @if($vehicle->number_of_rows)
                                <strong>{{ __('NUMBER OF ROWS') }}</strong>
                                <p>{{ $vehicle->number_of_rows }}</p>
                            @endif

                            <strong>{{ __('NUMBER OF SEATS') }}</strong>
                            <p>{{ $vehicle->number_of_seats }}</p>
                            <strong>{{ __('NUMBER OF DOORS') }}</strong>
                            <p>{{ $vehicle->number_of_doors }}</p>
                        
                            @if($vehicle->series)
                                <strong>{{ ('SERIES') }}</strong>
                                <p>{{ $vehicle->series }}</p>
                            @endif
                        </div>
                </div>
            </div>
        </div>

</div>
