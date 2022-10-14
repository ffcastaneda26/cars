<div>
    <u>
        <li>Las variables siguientes son de tipo bool y dependiendo de la que esté verdadera es lo que hay que presentar
        </li>
        <li>$can_continue = Se pone TRUE cuando el código sea verdadero</li>
        <li>$read_competidor_data = Cuando esté encendida solicitar los datos del competidor en un formulario:
            <ul>
                <li>(a) Nombre</li>
                <li>(b) Correo</li>
                <li>(c) Teléfono</li>
                <li>(*) Que acepta que es mayor de edad (No lo grabamos en base de datos)</li>
            </ul>
        </li>

        <li>$read_picks = Mostrar formulario para leer el pronóstico de todos los partidos (ver:
            livewire.picks.create_picks.blade.php)</li>
        <li>Me interesa ahorita los formularios </li>
    </u>

    <h1>{{ __('Quiniela Mundialista') }}</h1>
    <div>
        <div class="account-pages">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    @if (!$read_competidor_data)
                        {{-- Código de Cupón --}}
                        <div class="card" style="margin-top:15%">
                            <div class="card-body">
                                <div class="p-2">
                                    <h3 class="text-center">{{ __('Type Coupon Code') }}</h3>
                                    <div class="row justify-content-center">
                                        <div class="mb-3 col-lg-3">
                                            <input type="text"
                                                wire:model="coupon_code"
                                                wire:keyup="read_coupon"
                                                maxlength="8"
                                                pattern="[A-Z]{4}[0-9]{4}"
                                                class="form-control mb-2">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endif

                    {{--  Mensaje del Codigo  --}}
                    @if ($message_code && !$coupon_record)
                        <div class="card">
                            <div class="card-body">
                                <div class="p-2 text-danger">
                                    <h2>{{ $message_code }}</h2>
                                </div>
                            </div>
                        </div>
                    @endif

                    {{--  Se encontro el condigo  --}}
                    @if ($can_continue && $coupon_record && !$read_competidor_data)
                        <button wire:click="$set('read_competidor_data', true)"
                            class="btn btn-success waves-effect waves-light w-auto" title="{{ __('Continue') }}">
                            {{ __('Continue') }}
                        </button>
                    @endif

                    {{--  Read Competidor Data  --}}
                    @if ($read_competidor_data)
                        <div class="card" style="background: rgb(217, 213, 213)">
                            <div class="card-body">
                                {{-- Nombre --}}
                                <div class="flex-flex-column">
                                    <label>{{__("Firt Name")}}</label>
                                    <input type="text"
                                        wire:model="first_name"
                                        required
                                        placeholder="{{__("First Name")}}"
                                        maxlength="40"
                                        class="form-control mb-2"
                                    >
                                </div>
                                {{-- Nombre --}}
                                <div class="flex-flex-column">
                                    <label>{{__("Last Name")}}</label>
                                    <input type="text"
                                        wire:model="last_name"
                                        required
                                        placeholder="{{__("First Name")}}"
                                        maxlength="40"
                                        class="form-control mb-2"
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
                                                wire:click.prevent="store()"
                                                class="btn btn-success">
                                            {{__("Save") }}
                                        </button>
                                    </span>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
