<div class="card" style="background: rgb(217, 213, 213)">
    <div class="text-danger">
        <x-jet-validation-errors></x-jet-validation-errors>
    </div>
    <h2 class="text-center"> {{__('Code') .': '. $code}}</h2>
    <div class="card-body">
        {{-- Nombre --}}
        <div class="flex-flex-column">
            <label>{{__("First Name")}}</label>
            <input type="text"
                wire:model="first_name"
                required
                placeholder="{{__("First Name")}}"
                maxlength="40"
                class="form-control mb-2"
                name="first_name"
            >
        </div>
        {{-- Apellido --}}
        <div class="flex-flex-column">
            <label>{{__("Last Name")}}</label>
            <input type="text"
                wire:model="last_name"
                required
                placeholder="{{__("First Name")}}"
                maxlength="40"
                class="form-control mb-2"
                name="last_name"
            >
        </div>
        {{-- Correo --}}
        <div class="flex-flex-column">
            <label>{{__("Email")}}</label>
            <input type="email"
                    wire:model="email"
                    maxlength="100"
                    placeholder="{{__("Email")}}"
                    class="form-control mb-2"
                    name="email"
            >
        </div>

        {{-- Teléfono --}}
        <div class="flex-flex-column">
            <label>{{__("Phone")}}</label>
            <input type="text"
                    wire:model="phone"
                    maxlength="10"
                    placeholder="{{__("Phone")}}"
                    class="form-control mb-2"
                    name="phone"
            >
        </div>

        {{-- Acepta ser Mayor de Edad --}}
        <div class="row align-items-start">
            <label class="mt-2">{{__("I agree to be of legal age")}}
                <input type="checkbox"
                        wire:click="$toggle('agree_be_legal_age')"
                        class="checkbox"
                >
            </label>
        </div>
    </div>
    {{--  Save/Cancel  --}}
    <div class="d-flex justify-content-end">
        <span class="mx-2">
            <button wire:click="closeModal()" type="button"
                class="btn btn-danger">
                {{__("Cancel")}}
            </button>
        </span>

        @if ($agree_be_legal_age)
            <span class="mx-2">
                <button type="button"
                        wire:click.prevent="validate_competidor_data"
                        class="btn btn-success">
                    {{__("Save") }}
                </button>
            </span>
        @endif
    </div>
</div>