<div>
   <div class="vehicles-list">
        @foreach ($vehicles as $vehicle)
            @livewire('vehicle-card',['vehicle' => $vehicle],key($vehicle->id))
        @endforeach
    </div>

    <script type="text/javascript">
        window.onscroll = function (ev) {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                window.livewire.emit('load-more');
            }
        };
    </script>
</div>
