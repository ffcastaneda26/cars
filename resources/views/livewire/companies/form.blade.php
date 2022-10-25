<div class="container">
    <x-jet-validation-errors></x-jet-validation-errors>
    <div class="row align-items-start">
        <div class="col-md-5 flex flex-col">
            <label class="input-group-text mb-2">{{ __('Name') }}</label>
            <label class="input-group-text mb-2">{{ __('Email') }}</label>
            <label class="input-group-text mb-2">{{ __('Phone') }}</label>
            <label class="input-group-text mb-2">{{ __('Address') }}</label>
            <label class="input-group-text mb-2">{{ __('Zipcode') }}</label>
            <label class="input-group-text mb-2">{{ __('Town') }}</label>
            <label class="input-group-text mb-2">{{ __('Latitude') }}</label>
            <label class="input-group-text mb-2">{{ __('Longitude') }}</label>
            <label class="input-group-text mb-2">{{ __('Active') }}</label>
        </div>

        <div class="col flex flex-col">
            {{-- Nombre Compania --}}
            <div class="flex-flex-column">
                <input type="text" wire:model="main_record.name"
                maxlength="50"
                placeholder="{{__("Name")}}"
                class="form-control mb-2">
            </div>
            {{-- Email --}}
            <div class="flex-flex-column">
                <input type="text" wire:model="main_record.email" required maxlength="50" placeholder="{{__("Email")}}"
                class="form-control mb-2">
            </div>

            {{-- Phone --}}
            <div class="flex-flex-column">
                <input type="text" wire:model="main_record.phone"
                maxlength="10"
                placeholder="{{__("Phone")}}"
                class="form-control mb-2">
            </div>

            {{-- Direccion --}}
            <div class="flex-flex-column">
                <input type="text"
                wire:model="main_record.address"
                maxlength="30"
                placeholder="{{__("Address")}}"
                class="form-control mb-2">
            </div>

            {{-- Codigo postal --}}
            <div class="flex-flex-column">
                <input type="text"  wire:model="zipcode"
                wire:change="read_zipcode()"
                maxlength="5"
                placeholder="{{__("Zipcode")}}"
                class="form-control mb-2">
            </div>

            {{-- Estado --}}
            <div class="flex-flex-column">
                <input type="text" wire:model="town_state"
                    placeholder="{{$town_state}}"
                    class="form-control mb-2"
                    disabled
                >
            </div>
            {{-- Latitud --}}
            <div class="flex-flex-column">
                <input type="text" wire:model="main_record.latitude"
                maxlength="50"
                placeholder="{{__("Latitud")}}"
                class="form-control mb-2">
            </div>

            {{-- Longitud --}}
            <div class="flex-flex-column">
                <input type="text" wire:model="main_record.longitude"
                maxlength="50"
                placeholder="{{__("Longitud")}}"
                class="form-control mb-2">
            </div>

            <div class="flex-flex-column mt-2 mb-2">
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                    <input type="checkbox" wire:model="main_record.active" class="btn-check">
                    <label class="btn btn-outline-success" for="normal">Active</label>
                </div>
            </div>
        </div>
        {{-- Logotipo  --}}
        <div class="row align-items-start">
            <div class="col-lg-10  col-md-8 mb-4">
                <label class="fs-5">{{ __('Logotipo') }}</label>
                <input type="file" wire:model="logotipo" class="form-control">
            </div>
            <div class="col-lg-8">
                @if (isset($logotipo))
                    Preview:
                    <img src="{{ $logotipo->temporaryUrl() }}" class="avatar-md">
                @endif
            </div>
        </div>
    </div>
</div>
