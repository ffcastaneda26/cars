<div>
    {{-- TODO: Investigar si se puede habilitar "ver mas" en esta misma vista del componente --}}

    <div class="card h-100" style="width: 18rem;">

        @if($vehicle->photos->count())
            {{--  @include('livewire.search.commons.vehicle_photos_carrousel')  --}}
            @include('livewire.search.vehicle-card.vehicle-card-carrousel-photos')

        @else
            <img src="{{ asset('images/NoPhotos.jpg') }}" alt="NO TIENE FOTO">
        @endif


        <div class="card-body">
            @include('livewire.search.commons.vehicle_title')

            <div class="mb-0">
                <p class="card-text">{{$vehicle->style->name}} </p>
            </div>

            {{--  TODO: Mostrar o no precio?  --}}
            {{--  <div class="mb-0">
                @include('livewire.search.commons.vehicle_price')
            </div>  --}}

            <div class="d-flex justify-content-end">
                <div>{{__('Phone')}}:  <strong>713-231-3479</strong></div>
              </div>
        </div>

        <div class="card-footer text-muted">
            <div class="d-flex justify-content-between align-items-start">
                <p class="vehicle-alignleft">
                    <x-jet-button class="btn boton-cuervo">
                        <a href="{{ url('vehicle-details') .'/' . $vehicle->id }}" >{{ __('See more') }}</a>
                    </x-jet-button>
                </p>

                <p class="vehicle-alignleft">
                    <x-jet-button class="btn black-button">
                        <a href="tel:+7132313479">{{ __('Call') }}</a>
                 </x-jet-button>
                </p>
            </div>


        </div>


    </div>

    {{--  TODO: Se puede eliminar ?  --}}
    {{--  @if($show_more )
        @include('livewire.search.vehicle-card.see_more')
    @endif  --}}


</div>
