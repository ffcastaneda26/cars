<div class="w-auto col flex flex-col flex-wrap">
    @if($vehicle->drive)
    <label class="input-group-text mb-2">{{ $vehicle->drive }} </label>
    @endif

    @if($vehicle->engine_cylinders)
        <label class="input-group-text mb-2">{{ $vehicle->engine_cylinders }} </label>

    @endif

    @if($vehicle->number_of_seat_rows)
        <label class="input-group-text mb-2">{{ $vehicle->number_of_seat_rows }} </label>
    @endif

    @if($vehicle->number_of_seats)
        <label class="input-group-text mb-2">{{ $vehicle->number_of_seats }} </label>
    @endif

    @if($vehicle->wheel_size)
        <label class="input-group-text mb-2">{{ $vehicle->wheel_size }} </label>
    @endif


</div>


