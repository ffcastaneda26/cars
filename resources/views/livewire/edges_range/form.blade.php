<div class="container">
    <div class="text-danger">
        <x-jet-validation-errors></x-jet-validation-errors>
    </div>
    <div class="row align-items-start">
        <div class="col-md-3 flex flex-col">
            <label class="input-group-text mb-2">{{__("From")}}</label>
            <label class="input-group-text mb-2">{{__("To")}}</label>
        </div>

        <div class="col flex flex-col">
            {{-- Desde --}}

                <div class="flex-flex-column mb-2">
                       <input type="number"
                            wire:model="main_record.edge_from"
                            min="1"
                            max="99"
                        >
                </div>

            {{-- Hasta --}}
            <div class="flex-flex-column ">
                <input type="number"
                     wire:model="main_record.edge_to"
                     min="1"
                     max="99"
                 >
            </div>

        </div>
    </div>
</div>
