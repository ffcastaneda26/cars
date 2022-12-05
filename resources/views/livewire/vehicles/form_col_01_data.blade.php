<div class="w-auto col flex flex-col flex-wrap">
    <form>

        {{-- Marca --}}
        <div class="flex-flex-column">
            @if($main_record->make)
                <label class="form-control mb-2 input-group-text">
                    {{ __('Make') .':' . $main_record->make }}
                </label>
            @else
                <input type="text"
                    wire:model="main_record.make"
                    class="form-control mb-2"
                >

            @endif

        </div>

        {{-- Modelo --}}

        <div class="flex-flex-column">

            @if($main_record->model)
                <label class="form-control mb-2 input-group-text">
                    {{ __('Model') .':' . $main_record->model }}
                </label>
            @else
                <input type="text"
                    wire:model="main_record.model"
                    class="form-control mb-2"
                >

            @endif

        </div>

        {{-- Año --}}
        <div class="flex-flex-column">
            @if($main_record->model_year)
                <label class="form-control mb-2 input-group-text">
                    {{ __('Model Year') .':' . $main_record->model_year }}
                </label>
            @else
                <input type="text"
                    wire:model="main_record.model_year"
                    class="form-control mb-2"
                >

            @endif
        </div>

        {{-- Tipo --}}
        <div class="flex-flex-column">
            @if($main_record->product_type)
                <label class="form-control mb-2 input-group-text">
                    {{ __('Type') .':' . $main_record->product_type }}
                </label>
            @else
                <input type="text"
                    wire:model="main_record.product_type"
                    class="form-control mb-2"
                >

            @endif

        </div>

        {{-- Body --}}
        <div class="flex-flex-column">

            @if($main_record->product_type)
                <label class="form-control mb-2 input-group-text">
                    {{ __('Body') .':' . $main_record->product_type }}
                </label>
            @else
                <input type="text"
                    wire:model="main_record.product_type"
                    class="form-control mb-2"
                >

            @endif

        </div>

        {{-- Trim --}}
        <div class="flex-flex-column">

            @if($main_record->trim)
                <label class="form-control mb-2 input-group-text">
                    {{ __('Trim') .':' . $main_record->trim }}
                </label>
            @else
                <input type="text"
                    wire:model="main_record.trim"
                    class="form-control mb-2"
                >

            @endif
        </div>

        {{-- Series --}}
        <div class="flex-flex-column">
            @if($main_record->series)
                <label class="form-control mb-2 input-group-text">
                    {{ __('Series') .':' . $main_record->series }}
                </label>
            @else
                <input type="text"
                    wire:model="main_record.series"
                    class="form-control mb-2"
                >

            @endif

        </div>

        {{-- Drive --}}
        <div class="flex-flex-column">

            @if($main_record->drive)
                <label class="form-control mb-2 input-group-text">
                    {{ __('Drive') .':' . $main_record->drive }}
                </label>
            @else
                <input type="text"
                    wire:model="main_record.drive"
                    class="form-control mb-2"
                >

            @endif


        </div>

        {{-- Cilindros --}}
        <div class="flex-flex-column">

            @if($main_record->engine_cylinders)
                <label class="form-control mb-2 input-group-text">
                    {{ __('Cylinders') .':' . $main_record->engine_cylinders }}
                </label>
            @else
                <input type="text"
                    wire:model="main_record.engine_cylinders"
                    class="form-control mb-2"
                >

             @endif

        </div>


        {{-- Filas --}}
        <div class="flex-flex-column">
            @if($main_record->number_of_seat_rows)
                <label class="form-control mb-2 input-group-text">
                    {{ __('Seat Rows') .':' . $main_record->number_of_seat_rows }}
                </label>
            @else
                <input type="text"
                    wire:model="main_record.number_of_seat_rows"
                    class="form-control mb-2"
                >

            @endif

        </div>

        {{-- Asientos --}}
        <div class="flex-flex-column">
            @if($main_record->number_of_seats)
                <label class="form-control mb-2 input-group-text">
                    {{ __('Seats') .':' . $main_record->number_of_seats }}
                </label>
            @else
                <input type="text"
                    wire:model="main_record.number_of_seats"
                    class="form-control mb-2"
                >
            @endif

        </div>

    </form>

</div>
