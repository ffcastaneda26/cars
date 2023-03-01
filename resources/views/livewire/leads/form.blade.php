<div class="container">
    <div class="text-danger">
        <x-jet-validation-errors></x-jet-validation-errors>
    </div>
    <div class="row align-items-start">
        <div class="col-md-4 flex flex-col">
            <label class="input-group-text mb-2">{{__("Name")}}</label>
            <label class="input-group-text mb-2">{{__("Phone")}}</label>
            <label class="input-group-text mb-2">{{__("Email")}}</label>

        </div>

        <div class="col flex flex-col">
            {{-- Nombre --}}
            <div class="flex-flex-column">
                <input type="text"
                        wire:model="main_record.name"
                        required
                        placeholder="{{__("Name")}}"
                        class="form-control mb-2"
                        maxlength="80">
            </div>

            {{-- Teléfono --}}
            <div class="flex-flex-column">
                <input type="text"
                        wire:model="main_record.phone"
                        maxlength="10"
                        pattern="[0-9]"
                        placeholder="{{ __('Phone') }}"
                        class="form-control mb-2"
                >
            </div>


            {{-- Correo Electrónico --}}
            <div class="flex-flex-column">
                <input type="text"
                        wire:model="main_record.email"
                        maxlength="100"
                        placeholder="{{ __('Email') }}"
                        class="form-control mb-2"
                    >
            </div>



        </div>
    </div>
</div>
