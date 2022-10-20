<div class="container">
    <div class="text-danger">
        <x-jet-validation-errors></x-jet-validation-errors>
    </div>
    <div class="row align-items-start">
        <div class="col-md-4 flex flex-col">
            <label class="input-group-text mb-2">{{__("Spanish")}}</label>
            <label class="input-group-text mb-2">{{__("Short")}}</label>
            <label class="input-group-text mb-2">{{__("English")}}</label>
            <label class="input-group-text mb-2">{{__("Short")}}</label>
            <label class="input-group-text mb-2">{{__("Individual")}}</label>
        </div>

        <div class="col flex flex-col">
            {{-- Español --}}
            <div class="flex-flex-column">
                <input type="text"
                        wire:model="main_record.spanish"
                        required
                        placeholder="{{__("Spanish")}}"
                        maxlength="25"
                        class="form-control mb-2"
                >
            </div>

            {{-- Corto Español --}}
            <div class="flex-flex-column">
                <input type="text"
                        wire:model="main_record.short_spanish"
                        required
                        placeholder="{{__("Short")}}"
                        maxlength="8"
                        class="form-control mb-2"
                >
            </div>

             {{-- Inglés --}}
             <div class="flex-flex-column">
                <input type="text"
                        wire:model="main_record.english"
                        required
                        placeholder="{{__("English")}}"
                        maxlength="25"
                        class="form-control mb-2"
                >
            </div>
            {{-- Corto Español --}}
            <div class="flex-flex-column">
                <input type="text"
                        wire:model="main_record.short_english"
                        required
                        placeholder="{{__("Short")}}"
                        maxlength="8"
                        class="form-control mb-2"
                >
            </div>


            {{-- ¿Es individual? --}}

            <div class="flex-flex-column mb-2">
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" wire:model="individual" class="btn-check" name="type" id="individual_yes" value="1">
                    <label class="btn btn-outline-success" for="individual_yes">{{__('Yes')}}</label>

                    <input type="radio" wire:model="individual" class="btn-check ml-4" name="type" id="individual_no" value="0">
                    <label class="btn btn-outline-danger" for="individual_no">{{__('No')}}</label>
                </div>
            </div>

        </div>
    </div>

    {{-- Logotipo  --}}
    @include('livewire.commons.input_logotipo_field')
</div>
