<div class="container">
    <x-jet-validation-errors></x-jet-validation-errors>
    <div class="row align-items-start">
        <div class="w-auto flex flex-col">
            <label class="input-group-text mb-2">{{ __('Make') }}</label>
            <label class="input-group-text mb-2">{{ __('Name') }}</label>
        </div>

            <div class="col flex flex-col">
                <form>
                    {{-- Marca --}}
                    <div class="flex-flex-column">
                        <select wire:model="make_id"
                                class="form-select form-select-md  rounded w-auto mb-2"
                        >
                            <option>{{ __('Make') }}</option>

                            @foreach ($$makesList as $make)
                                <option value="{{ $make->id }}">
                                    {{ $make->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Nombre --}}
                    <div class="flex-flex-column">
                        <input type="text"
                            wire:model="main_record.name"
                            maxlength="50"
                            placeholder="{{__("Name")}}"
                            class="form-control mb-2"
                        >
                    </div>


                </form>
            </div>

    </div>
</div>
