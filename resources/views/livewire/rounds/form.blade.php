<div class="container">
    <div class="text-danger">
        <x-jet-validation-errors></x-jet-validation-errors>
    </div>
    <div class="row align-items-start">
        <div class="col-md-4 flex flex-col">
            <label class="input-group-text mb-2">{{__("From")}}</label>
            <label class="input-group-text mb-2">{{__("To")}}</label>
            <label class="input-group-text mt-2">{{ __('Active?') }}</label>
        </div>

        <div class="col flex flex-col">
            {{-- Desde --}}
            <div class="flex-flex-column">
                <input type="date"
                        wire:model="main_record.from"
                        required
                        placeholder="{{__("From")}}"
                        class="form-control mb-2"

                >
            </div>
            {{-- Desde --}}
            <div class="flex-flex-column">
                <input type="date"
                        wire:model="main_record.to"
                        required
                        placeholder="{{__("To")}}"
                        class="form-control mb-2"
                >
            </div>

            {{-- ¿Activo? --}}
            @include('livewire.commons.input_active_field')



        </div>
    </div>

</div>
