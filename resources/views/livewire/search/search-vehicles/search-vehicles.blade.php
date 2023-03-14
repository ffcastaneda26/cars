<div class="vehicles-list">
    @foreach ($vehicles as $vehicle)
        @livewire('vehicle-card',['vehicle' => $vehicle],key($vehicle->id))
    @endforeach
</div>
