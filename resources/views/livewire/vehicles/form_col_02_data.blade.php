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
        @if($main_record->steeering)

            <div class="flex-flex-column">
         
                <label class="form-control mb-2 input-group-text">
                    {{ __('Steeering') .': ' . $main_record->steeering }}
                </label>

            </div>
        @endif

        {{-- Desplazamiento Motor --}}
        @if($main_record->engine_displacement)

            <div class="flex-flex-column">
                    <label class="form-control mb-2 input-group-text">
                        {{ __('Engine') .':' . number_format(floatval($main_record->engine_displacement/1000),2) }}

                    </label>
            </div>
        @endif

        {{-- Poder en Kw --}}
        @if($main_record->engine_power_kw)
            <div class="flex-flex-column">
                    <label class="form-control mb-2 input-group-text">
                        {{ __('Power kw') .':' . $main_record->engine_power_kw }}
                    </label>
            </div>
        @endif


        {{-- Poder Hp --}}
        @if($main_record->engine_power_hp)
        
            <div class="flex-flex-column">
                <label class="form-control mb-2 input-group-text">
                    {{ __('Power Hp') .':' . $main_record->engine_power_hp }}
                </label>
            </div>
        @endif

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
        @if($main_record->fuel_type_secondary)

            <div class="flex-flex-column">

                    <label class="form-control mb-2 input-group-text">
                        {{ __('Secondary Fuel') .':' . $main_record->fuel_type_secondary }}
                    </label>


            </div>
            @endif

        {{-- Model motor --}}
        @if($main_record->engine_model)

            <div class="flex-flex-column mb-2">
                    <label class="form-control mb-2 input-group-text">
                        {{ __('Engine Model') .':' . $main_record->engine_model }}
                    </label>
            </div>
        @endif

        {{-- Transmisión --}}
        @if($main_record->transmission)
        
            <div class="flex-flex-column">
                    <label class="form-control mb-2 input-group-text">
                        {{ __('Transmission') .':' . $main_record->transmission }}
                    </label>
            </div>
        @endif

        {{-- Transmisión Completa --}}
        {{-- <div class="flex-flex-column">
            @if($main_record->transmission_full)
                <label class="form-control mb-2 input-group-text">
                    {{ __('Transmission Full') .':' . $main_record->transmission_full }}
                </label>
            @endif
        </div> --}}

        {{-- Engranes --}}
        @if($main_record->number_of_gears)
        
            <div class="flex-flex-column">
                    <label class="form-control mb-2 input-group-text">
                        {{ __('Gears') .':' . $main_record->number_of_gears }}
                    </label>
            </div>
        @endif

    </form>
</div>
