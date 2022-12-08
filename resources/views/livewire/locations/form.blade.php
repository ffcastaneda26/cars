<div class="container">
    <x-jet-validation-errors></x-jet-validation-errors>
    <div class="row align-items-start">
        <div class="col-md-5 flex flex-col">
            <label class="input-group-text mb-2">{{ __('Dealer') }}</label>
            <label class="input-group-text mb-2">{{ __('Name') }}</label>
            <label class="input-group-text mb-2">{{ __('Email') }}</label>
            <label class="input-group-text mb-2">{{ __('Phone') }}</label>
            <label class="input-group-text mb-2">{{ __('Address') }}</label>
            <label class="input-group-text mb-2">{{ __('Zipcode') }}</label>
            @if($main_record->zipcode)
                <label class="input-group-text mb-2">{{__("City")}}</label>
            @endif
            <label class="input-group-text mb-2">{{ __('Active') }}</label>
        </div>

            <div class="col flex flex-col">
                <form>
                    {{-- Distribuidor --}}
                    <div class="flex-flex-column mb-2">
                        @if($show_dealers)
                            <select wire:model="main_record.dealer_id"
                                class="form-select">
                                <option value="">{{__("Dealer")}}</option>
                                @foreach($dealers as $dealer)
                                        <option value="{{ $dealer->id }}">{{ $dealer->name }}</option>
                                @endforeach
                            </select>
                        @else
                            <label class="input-group-text mb-2">{{ $this->main_record->dealer->name }}</label>
                        @endif
                    </div>
                    @include('livewire.commons.main_record_input_name_field')
                    @include('livewire.commons.main_record_input_email_field')
                    @include('livewire.commons.main_record_input_phone_field')
                    @include('livewire.commons.main_record_input_address_field')
                    @include('livewire.commons.input_zipcode_field')
                    @include('livewire.commons.label_town_state')
                    @include('livewire.commons.input_active_field')
                </form>
            </div>
    </div>
</div>
