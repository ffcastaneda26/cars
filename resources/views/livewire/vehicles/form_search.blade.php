<div class="d-flex ">
    {{-- Sucursal --}}
    <div class="p-2">
        <label class="input-group-text">
            {{ __('Location') }}
        </label>
    </div>

    <div class="p-2 w-30">
        <select wire:model="main_record.location_id"
                class="form-select mb-2">
                <option value="">{{__("Location")}}</option>
                @foreach($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                @endforeach
        </select>
    </div>

    {{-- Número de VIN --}}
    <div class="p-2">
        <label class="input-group-text mb-2">
            {{ __('VIN') }}
        </label>
    </div>
    <div class="p-2">
        <input type="text"
            wire:model="vin_number"
            wire:keyup="search_vin"
            maxlength="17"
            minlength="17"
            placeholder="{{__("VIN number")}}"
            class="form-control mb-2"
        >
    </div>

    {{-- Mensaje de Error --}}
    @if($error_message)
        <div class="p-2  bd-highlight">
            <label  class="bg-danger ml-5"><h3>{{ $error_message }}</h3></label>
        </div>
    @endif
</div>
