{{-- Ícono Favoritos --}}
{{-- @if($vehicle->add_favorites()) --}}
    @livewire('vehicle-favorite',['vehicle' => $vehicle],key($vehicle->id))
{{-- @endif --}}
