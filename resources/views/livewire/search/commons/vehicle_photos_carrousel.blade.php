<!-- Carrusel de fotos del Vehiculo-->
@if($vehicle->photos->count())
    @include('livewire.search.show-carrousel-images')
@else
    <img src="{{ asset('images/NoPhotos.jpg') }}" alt="NO TIENE FOTO">
@endif