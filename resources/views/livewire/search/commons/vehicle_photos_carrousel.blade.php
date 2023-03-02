<!-- Carrusel de fotos del Vehiculo-->
{{--  Para ampliar al  maximo  --}}
<div class="card h-100">
    @if($vehicle->photos->count())
        @include('livewire.search.show-carrousel-images')
    @else
        <img src="{{ asset('images/NoPhotos.jpg') }}" alt="NO TIENE FOTO">
    @endif
</div>
