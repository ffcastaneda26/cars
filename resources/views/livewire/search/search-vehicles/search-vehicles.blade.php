<div>
    {{-- TODO: Habilitar solo en caso de que sea necesario --}}
    {{-- @if($show_only_favorites)
        <div class="container">
            <div class="text-right">
                <button wire:click="$toggle('show_only_favorites')"
                        class="btn btn-lg btn-success">
                    {{ __('View All') }}
                </button>
            </div>
        </div>

    @endif --}}

    <div class="vehicles-list">
        @foreach ($vehicles as $vehicle)
            @livewire('vehicle-card',['vehicle' => $vehicle],key($vehicle->id))
        @endforeach

    </div>
</div>
