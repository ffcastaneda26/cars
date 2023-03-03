
<div class="container">
    {{-- TODO: Investigar si se puede insertar en la tarjeta del vehículo  --}}

    <div class="row row-cols-1 row-cols-md-1 g-1">
        <div class="card h-100">
            <div class="row">
                <div class="alinea-derecha">
                    <button class="btn btn-dark mb-2">
                        <a href="{{route('vehicle-search')}}" class="waves-effect" style="none">
                            <span> {{__('Return')}} </span>
                        </a>
                    </button>
                </div>
            </div>

            @include('livewire.search.commons.vehicle_photos_carrousel')


            <div class="row">
                <div class="card-body">

                @include('livewire.search.commons.vehicle_title')

                </div>
                <div>
                    <p>
                        {{$vehicle->description }}
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="card-footer text-muted">
                    <div class="d-flex justify-content-between align-items-start">

                        <p class="vehicle-alignleft">
                            <strong>{{__('Stock Number')}} {{$vehicle->stock }}</strong>
                        </p>

                        <p class="vehicle-alignright">
                            <x-jet-button class="btn black-button">
                                <a href="tel:+17132313470">{{ __('Call') }}</a>
                            </x-jet-button>
                        </p>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

