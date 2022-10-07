<div class="container">
    <div class="text-danger">
        <x-jet-validation-errors></x-jet-validation-errors>
    </div>
    <div class="row align-items-start">
        <div class="col-md-4 flex flex-col">
            <label class="input-group-text mb-2">{{__("Name")}}</label>
            <label class="input-group-text mb-2">{{__("Email")}}</label>
            <label class="input-group-text mb-2">{{__("Phone")}}</label>
            <label class="input-group-text mb-2">{{__("Address")}}</label>
            <label class="input-group-text mb-2">{{__("Zipcode")}}</label>
            @if($main_record->zipcode)
                <label class="input-group-text mb-2">{{__("City")}}</label>
            @endif
            <label class="input-group-text mt-4">{{ __('Active?') }}</label>
        </div>

        <div class="col flex flex-col">
            {{-- Nombre --}}
            <div class="flex-flex-column">
                <input type="text"
                        wire:model="main_record.name"
                        required
                        placeholder="{{__("Name")}}"
                        maxlength="150"
                        class="form-control mb-2"
                >
            </div>

            {{-- Correo --}}
            <div class="flex-flex-column">
                <input type="email"
                        wire:model="main_record.email"
                        maxlength="100"
                        placeholder="{{__("Email")}}"
                        class="form-control mb-2"
                >
            </div>

            {{-- Teléfono --}}
            <div class="flex-flex-column">
                <input type="text"
                        wire:model="main_record.phone"
                        maxlength="10"
                        onkeypress="return only_numbers(event, this)"
                        pattern="[0-9]{10}"
                        placeholder="{{__("Phone")}}"
                        class="form-control mb-2"
                >
            </div>

            {{-- Address --}}
            <div class="flex-flex-column">
                <input type="text"
                        wire:model="main_record.address"
                        maxlength="100"
                        placeholder="{{__("Address")}}"
                        class="form-control mb-2"
                >
            </div>

            {{-- Zipcode --}}
            <div class="flex-flex-column">
                <input type="text"
                        wire:model="main_record.zipcode"
                        wire:change="read_zipcode"
                        maxlength="5"
                        onkeypress="return only_numbers(event, this)"
                        class="form-control mb-2"
                >
            </div>


            {{-- City --}}
            @if($main_record->zipcode)
                <div class="flex-flex-column">
                        <input type="text"
                                wire:model="town_state"
                                disabled
                                class="form-control mb-4"
                        >
                </div>
            @endif

            {{-- ¿Activo? --}}

            <div class="flex-flex-column">
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" wire:model="active" class="btn-check" name="type" id="active" value="1">
                    <label class="btn btn-outline-success" for="active">{{__('Active')}}</label>

                    <input type="radio" wire:model="active" class="btn-check ml-4" name="type" id="inactive" value="0">
                    <label class="btn btn-outline-danger" for="inactive">{{__('Inactive')}}</label>
                </div>
            </div>



        </div>
    </div>

            {{-- Logotipo  --}}
            <div class="row align-items-start">
                <div class="col-lg-10  col-md-8 mb-4">
                    <label class="fs-5">{{ __('Logo') }}</label>
                    <input type="file" wire:model="file_path" class="form-control">
                </div>
                <div class="col-lg-8">
                    @if (isset($file_path))
                        Preview:
                        <img src="{{ $file_path->temporaryUrl() }}" class="avatar-md">
                    @endif
                    {{-- @if ($main_record->logotipo()->count())
                        <img src="{{ asset($main_record->logotipo) }}"
                            class="mt-1 avatar-lg"
                            alt="Logo"
                        >
                    @endif --}}
                </div>
        </div>
</div>
