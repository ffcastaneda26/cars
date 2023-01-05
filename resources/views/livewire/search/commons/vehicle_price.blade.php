<p class="vehicle-precio">
    @if($vehicle->show_price() && $vehicle->price)
        ${{number_format($vehicle->price, 0, '.', ',') }}
    @else
        {{ __('Call for Price') }}
    @endif
</p>