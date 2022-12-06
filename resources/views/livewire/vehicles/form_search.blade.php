<div class="d-flex ">
    {{-- Sucursal --}}
    <div class="p-2">
        <label class="input-group-text">
            {{ __('Location') }}
        </label>
    </div>

    <div class="p-2 w-30">
        <select wire:model="main_record.location_id"
                wire:change="search_vin"
                class="form-select mb-2"
                @if($locations->count() == 1) disabled @endif
        >
                <option value="">{{__("Location")}}</option>
                @foreach($locations as $location)
                        <option value="{{ $location->id }}"
                            @if($locations->count() == 1) selected @endif
                        >
                            {{ $location->name }}
                        </option>

                @endforeach
        </select>
    </div>

    {{-- Número de VIN --}}
    <div class="p-2">
        <label class="input-group-text mb-2">
            {{ __('VIN') }}
        </label>
    </div>
    @if($main_record->location_id)
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
    @endif
    {{-- Mensaje de Error --}}
    @if($error_message)
        <div class="p-2  bd-highlight">
            <label  class="bg-danger ml-5"><h5>{{ $error_message }}</h5></label>
        </div>
    @endif
</div>
