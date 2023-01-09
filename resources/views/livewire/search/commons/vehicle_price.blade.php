<p class="vehicle-precio">

    @if($vehicle->price)
        ${{number_format($vehicle->price, 0, '.', ',') }}
    @else
        {{ __('Call for Price') }}
    @endif
</p>
