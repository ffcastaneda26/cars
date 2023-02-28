<!-- Carrusel de fotos del Vehiculo-->
<div class="card h-100" style="width: 18rem;"> // Para ampliar al  maximo
    @if($vehicle->photos->count())
        @include('livewire.search.show-carrousel-images')
    @else
        <img src="{{ asset('images/NoPhotos.jpg') }}" alt="NO TIENE FOTO">
    @endif
</div>
