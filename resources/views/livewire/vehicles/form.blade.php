<div class="container">
    <div class="row align-items-start">
        <div class="w-auto flex flex-col">
            <label class="input-group-text mb-2">{{ __('VIN') }}</label>
        </div>
        <div class="w-auto flex flex-col">
            <div class="d-flex">
                <div class="flex-flex-column ">
                    <input type="text"
                        wire:model="vin_number"
                        wire:keyup="search_vin"
                        maxlength="17"
                        minlength="17"
                        placeholder="{{__("VIN number")}}"
                        class="form-control mb-2"
                    >
                </div>
                @if($error_message)
                    <div class="flex-flex-column ml-20">
                        <label  class="bg-danger ml-5"><h3>{{ $error_message }}</h3></label>

                    </div>
                @endif
            </div>
        </div>

    </div>
    <div class="contanier-fluid">

        <x-jet-validation-errors></x-jet-validation-errors>
        <div class="row align-items-start">
            @if($show_form)
                @include('livewire.vehicles.form_col_01')
                @include('livewire.vehicles.form_col_02')
                @include('livewire.vehicles.form_col_03')
            @else
                @include('livewire.vehicles.form_col_01_labels')
                @include('livewire.vehicles.form_col_02_labels')
                @include('livewire.vehicles.form_col_03_labels')

            @endif

        </div>
    </div>
</div>
