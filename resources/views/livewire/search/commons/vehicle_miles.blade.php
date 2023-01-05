@if($vehicle->miles)
    <p class="card-text">{{number_format($vehicle->miles, 0, '.', ',') . ' ' . __('Miles')}} </p>
@else
    <div></div>
@endif