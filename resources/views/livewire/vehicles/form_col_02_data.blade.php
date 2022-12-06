<div class="w-auto col flex flex-col flex-wrap">
    <form>
        {{-- Puertas --}}
        <div class="flex-flex-column">
            @if($main_record->number_of_doors)
                <label class="form-control mb-2 input-group-text">
                    {{ __('Doors') .':' . $main_record->number_of_doors }}
                </label>
            @else
                <input type="text"
                    wire:model="main_record.number_of_doors"
                    class="form-control mb-2"
                >

            @endif


        </div>

        {{-- Direccion --}}

        <div class="flex-flex-column">

            @if($main_record->steeering)
                <label class="form-control mb-2 input-group-text">
                    {{ __('Steeering') .': ' . $main_record->steeering }}
                </label>
            @else
                <input type="text"
                    wire:model="main_record.steeering"
                    class="form-control mb-2"
                >

            @endif


        </div>

        {{-- Desplazamiento Motor --}}
        <div class="flex-flex-column">
            @if($main_record->engine_displacement)
                <label class="form-control mb-2 input-group-text">
                    {{ __('Engine Displacement') .':' . $main_record->engine_displacement }}
                </label>
            @else
                <input type="text"
                    wire:model="main_record.engine_displacement"
                    class="form-control mb-2"
                >

            @endif


        </div>

        {{-- Poder en Kw --}}

        <div class="flex-flex-column">
            @if($main_record->engine_power_kw)
                <label class="form-control mb-2 input-group-text">
                    {{ __('Power kw') .':' . $main_record->engine_power_kw }}
                </label>
            @else
                <input type="text"
                    wire:model="main_record.engine_power_kw"
                    class="form-control mb-2"
                >

            @endif

        </div>

        {{-- Poder Hp --}}
        <div class="flex-flex-column">

            @if($main_record->engine_power_hp)
                <label class="form-control mb-2 input-group-text">
                    {{ __('Power Hp') .':' . $main_record->engine_power_hp }}
                </label>
            @else
                <input type="text"
                    wire:model="main_record.engine_power_hp"
                    class="form-control mb-2"
                >
            @endif

        </div>


        {{-- Combustible Primario --}}
        <div class="flex-flex-column">
            @if($main_record->fuel_type_primary)
                <label class="form-control mb-2 input-group-text">
                    {{ __('Primary Fuel') .':' . $main_record->fuel_type_primary }}
                </label>
            @else
                <input type="text"
                    wire:model="main_record.fuel_type_primary"
                    class="form-control mb-2"
                >
            @endif

        </div>

        {{-- Combustible Secundario --}}
        <div class="flex-flex-column">

            @if($main_record->fuel_type_secondary)
                <label class="form-control mb-2 input-group-text">
                    {{ __('Secondary Fuel') .':' . $main_record->fuel_type_secondary }}
                </label>
            {{-- @else
                <input type="text"
                    wire:model="main_record.fuel_type_secondary"
                    class="form-control mb-2"
                > --}}
            @endif

        </div>

        {{-- Model motor --}}
        <div class="flex-flex-column mb-2">
            @if($main_record->engine_model)
                <label class="form-control mb-2 input-group-text">
                    {{ __('Engine Model') .':' . $main_record->engine_model }}
                </label>
            {{-- @else
                <input type="text"
                    wire:model="main_record.engine_model"
                    class="form-control mb-2"
                > --}}
            @endif

        </div>

        {{-- Transmisión --}}
        <div class="flex-flex-column">

            @if($main_record->transmission)
                <label class="form-control mb-2 input-group-text">
                    {{ __('Transmission') .':' . $main_record->transmission }}
                </label>
            @else
                <input type="text"
                    wire:model="main_record.transmission"
                    class="form-control mb-2"
                >
            @endif

        </div>

        {{-- Transmisión Completa --}}
        <div class="flex-flex-column">
            @if($main_record->transmission_full)
                <label class="form-control mb-2 input-group-text">
                    {{ __('Transmission Full') .':' . $main_record->transmission_full }}
                </label>
            {{-- @else
                <input type="text"
                    wire:model="main_record.transmission_full"
                    class="form-control mb-2"
                > --}}
            @endif

        </div>

        {{-- Engranes --}}
        <div class="flex-flex-column">
            @if($main_record->number_of_gears)
                <label class="form-control mb-2 input-group-text">
                    {{ __('Gears') .':' . $main_record->number_of_gears }}
                </label>
            @else
                <input type="text"
                    wire:model="main_record.number_of_gears"
                    class="form-control mb-2"
                >
            @endif


        </div>

    </form>
</div>
