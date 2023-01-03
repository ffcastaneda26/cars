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
            <p class="vehicle-alignleft"><a href="#" class="btn btn-dark"><b>Contactar</b></a></p>
            <p class="vehicle-precio">
                @if($vehicle->show_price() && $vehicle->price)
                    ${{number_format($vehicle->price, 0, '.', ',') }}
                @endif
            </p>
        </div>

        <div class="card-body">
            <div class="row">
                    <div class="col-sm">
                        <strong>{{ __('VIN NUMBER') }}</strong>
                        <p>{{ $vehicle->vin }}</p>
                        <strong>{{ __('BODY') }}</strong>
                        <p>{{ $vehicle->body }}</p>
                        <strong>{{ __('DRIVE') }}</strong>
                        <p>{{ $vehicle->drive }}</p>
                        <strong>{{ __('TRANSMISSION') }}</strong>
                        <p>{{ $vehicle->transmission }}</p>
                        <strong>{{ __('ENGINE') }}</strong>
                        {{-- <p>{{ $vehicle->engine_displacement/1000 }}L</p> --}}
                        
                        <p>{{  number_format(floatval($main_record->engine_displacement/1000),2) }}L</p>
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
                        <p>{{ $vehicle->material_id }}</p>
                        <p>{{ App::isLocale('en') ? $vehicle->material->english : $vehicle->material->spanish}}</p>

                        <strong>{{ __('NUMBER OF ROWS') }}</strong>
                        <p>{{ $vehicle->number_of_rows }}</p>
                        <strong>{{ __('NUMBER OF SEATS') }}</strong>
                        <p>{{ $vehicle->number_of_seats }}</p>
                        <strong>{{ __('NUMBER OF DOORS') }}</strong>
                        <p>{{ $vehicle->number_of_doors }}</p>
                        <strong>{{ ('SERIES') }}</strong>
                        <p>{{ $vehicle->series }}</p>
                    </div>
            </div>
        </div>


    </div>

    @if($show_more )
        @include('livewire.search.vehicle-card.see_more')
    @endif


</div>
