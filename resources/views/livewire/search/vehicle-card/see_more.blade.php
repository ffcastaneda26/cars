
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
                    {{--  TODO: Cambiar este carrousel por una coleccion de tarjetas  --}}
                    @include('livewire.search.show-carrousel-images')
                @else
                    <img src="{{ asset('images/NoPhotos.jpg') }}" alt="NO TIENE FOTO">
                @endif

                <div class="card-body">
                    <div class="card-title">
                        <h5 class="card-title"> {{ $vehicle->model_year }} {{ $vehicle->make }}  {{ $vehicle->model }}</h5>
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>
