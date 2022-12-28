<div class="w-auto flex flex-col">
    @if($vehicle->drive)
        <label class="input-group-text mb-2">{{__('Drive') }} </label>
    @endif

    @if($vehicle->engine_cylinders)
        <label class="input-group-text mb-2">{{__('Cylinders') }} </label>
    @endif

    @if($vehicle->number_of_seat_rows)
        <label class="input-group-text mb-2">{{__('Seat Rows') }} </label>
    @endif

    @if($vehicle->number_of_seats)
        <label class="input-group-text mb-2">{{__('Seats') }} </label>
    @endif

    @if($vehicle->wheel_size)
        <label class="input-group-text mb-2">{{__('Weel Size') }} </label>
    @endif


</div>
