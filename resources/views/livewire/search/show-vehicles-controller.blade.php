<div>
    <div class="vehicles-list">

        @foreach ($vehicles as $vehicle)
            @livewire('vehicle-card-controller',['vehicle' => $vehicle],key($vehicle->id))
        @endforeach

    </div>
</div>
