<div class="container">
    <x-jet-validation-errors></x-jet-validation-errors>
    <div class="row align-items-start">
        <div class="col-md-5 flex flex-col">
            <label class="input-group-text mb-2">{{ __('Name') }}</label>
            <label class="input-group-text mb-2">{{ __('Zipcode') }}</label>
            @if($main_record->zipcode)
                <label class="input-group-text mb-2">{{__("City")}}</label>
            @endif
            <label class="input-group-text mb-2">{{ __('Active') }}</label>
        </div>

            <div class="col flex flex-col">
                <form>
                    @include('livewire.commons.main_record_input_name_field')
                    @include('livewire.commons.input_zipcode_field')
                    @include('livewire.commons.label_town_state')
                    @include('livewire.commons.input_active_field')
                </form>
            </div>

    </div>
</div>
