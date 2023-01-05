
<div class="container">
    {{-- TODO: Investigar si se puede insertar en la tarjeta del vehículo  --}}

    <div class="row row-cols-1 row-cols-md-1 g-1">
        <div class="card h-100">
            <div class="row">
                <div class="alinea-derecha">
                    <button class="btn btn-dark mb-2">
                        <a href="{{route('vehicle-search')}}" class="waves-effect" style="none">
                            <span> {{__('Search Vehicles')}} </span>
                        </a>
                    </button>
                </div>
            </div>

            @include('livewire.search.commons.vehicle_photos_carrousel')


            <div class="row">
                <div class="card-body">
                
                @include('livewire.search.commons.vehicle_title')

                @include('livewire.search.commons.vehicle_body')
          
                <div class="d-flex justify-content-between align-items-start">
                    @include('livewire.search.commons.vehicle_miles')
                    @include('livewire.search.commons.vehicle_favorites')
                </div>
    
                {{-- Etiquetas --}}
                @include('livewire.search.commons.vehicle_tags')
        
                </div>
            </div>

            <div class="row">
                <div class="card-footer text-muted">
                    <div class="vehicle-alignleft">
                        @livewire('add-contact-user',['vehicle' => $vehicle],key($vehicle->id))
                    </div>
                    
                    @include('livewire.search.commons.vehicle_price')

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
    </div>
</div>

