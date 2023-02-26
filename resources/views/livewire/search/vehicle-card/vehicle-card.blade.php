<div>
    {{-- TODO: Investigar si se puede habilitar "ver mas" en esta misma vista del componente --}}

    <div class="card h-100" style="width: 18rem;">
        @include('livewire.search.commons.vehicle_photos_carrousel')

        <div class="card-body">

            @include('livewire.search.commons.vehicle_title')

            <div class="mb-0">
                <p class="card-text">{{$vehicle->style->name}} </p>
            </div>

            {{--  TODO: Mostrar o no precio?  --}}
            {{--  <div class="mb-0">
                @include('livewire.search.commons.vehicle_price')
            </div>  --}}


        </div>

        <div class="card-footer text-muted">
            <div class="d-flex justify-content-between align-items-start">
                <p class="vehicle-alignleft">
                       <x-jet-button class="btn boton-cuervo waves-effect">
                        <a href="{{ url('vehicle-details') .'/' . $vehicle->id }}" class=" text-white">{{ __('See more') }}</a>
                    </x-jet-button>
                </p>

                <p class="vehicle-alignleft">
                    <x-jet-button class="btn boton-cuervo waves-effect text-white">
                        <a href="tel:+2811234567" class=" text-white">{{ __('2811234567') }}</a>
                 </x-jet-button>
                </p>
            </div>


        </div>


    </div>

    @if($show_more )
        @include('livewire.search.vehicle-card.see_more')
    @endif


</div>
