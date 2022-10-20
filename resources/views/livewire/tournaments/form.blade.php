<div class="container">
    <div class="text-danger">
        <x-jet-validation-errors></x-jet-validation-errors>
    </div>
    <div class="row align-items-start">
        <div class="col-md-4 flex flex-col">
            <label class="input-group-text mb-2">{{__("Sport")}}</label>
            <label class="input-group-text mb-2">{{__("Name")}}</label>
            <label class="input-group-text mb-2">{{__("Ties?")}}</label>
            <label class="input-group-text mb-2">{{__("All Picks?")}}</label>
            <label class="input-group-text mb-2">{{__("Mins Before")}}</label>
            <label class="input-group-text mt-2">{{ __('Avai User Reg?') }}</label>
            <label class="input-group-text mt-2">{{ __('Pick Avai') }}</label>
            <label class="input-group-text mt-2">{{ __('Active?') }}</label>

        </div>

        <div class="col flex flex-col">
            {{-- Deporte --}}
            <div class="flex-flex-column mb-2">
                <div class="col-lg-4">
                    <select  wire:model="main_record.sport_id"
                            class="form-select mb-2">
                        <option value="">{{ __('Sport') }}</option>
                        @foreach ($sports as $sport_select)

                            <option
                                class="block mt-0 text-sm leading-tight font-semibold text-gray-900 hover:underline"
                                value="{{ $sport_select->id }}">
                                @if(App::isLocale('en'))
                                    {{ $sport_select->english }}
                                @else
                                    {{ $sport_select->spanish }}

                                @endif
                            </option>
                        @endforeach
                    </select>
                </div>

            </div>

            {{-- Nombre --}}
            <div class="flex-flex-column">
                <input type="text"
                        wire:model="main_record.name"
                        required
                        placeholder="{{__("Name")}}"
                        maxlength="100"
                        class="form-control mb-2"
                >
            </div>


            {{-- Permite Empates? --}}

            <div class="flex-flex-column mb-2">
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" wire:model="allow_ties" class="btn-check" name="ties" id="ties_yes" value="1">
                    <label class="btn btn-outline-info" for="ties_yes">{{__('Yes')}}</label>
                    <input type="radio" wire:model="allow_ties" class="btn-check ml-4" name="ties" id="ties_no" value="0">
                    <label class="btn btn-outline-warning" for="ties_no">{{__('No')}}</label>
                </div>
            </div>

            {{-- Pedir todos los pronósticos de la jornada --}}

            <div class="flex-flex-column mb-2">
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" wire:model="require_all_picks" class="btn-check" name="picks" id="all_picks_ues" value="1">
                    <label class="btn btn-outline-info" for="all_picks_ues">{{__('Yes')}}</label>
                    <input picks="radio" wire:model="require_all_picks" class="btn-check ml-4" name="type" id="all_picks_no" value="0">
                    <label class="btn btn-outline-warning" for="all_picks_no">{{__('No')}}</label>
                </div>
            </div>

            {{-- Minutos antes que inicie para bloquear pronósticos --}}

            <div class="flex-flex-column mb-2">
                <input type="number"
                    wire:model="main_record.minutes_before_to_edit"
                    min="5"
                    max="9999"
                >
            </div>
            {{-- Habilitar usuarios al registrarse --}}

            <div class="flex-flex-column mb-2 mt-3">
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" wire:model="available_user_at_register" class="btn-check" name="ava_usu" id="ava_reg_yes" value="1">
                    <label class="btn btn-outline-info" for="ava_reg_yes">{{__('Yes')}}</label>
                    <input type="radio" wire:model="available_user_at_register" class="btn-check ml-4" name="ava_usu" id="ava_reg_no" value="0">
                    <label class="btn btn-outline-warning" for="ava_reg_no">{{__('No')}}</label>
                </div>
            </div>

            {{-- Crear pronósticos al habilitar usuario --}}
            <div class="flex-flex-column mb-2">
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" wire:model="create_picks_at_available" class="btn-check" name="pick_ava" id="pick_av_us_yes" value="1">
                    <label class="btn btn-outline-info" for="pick_av_us_yes">{{__('Yes')}}</label>
                    <input type="radio" wire:model="create_picks_at_available" class="btn-check ml-4" name="pick_ava" id="pck_av_us_no" value="0">
                    <label class="btn btn-outline-warning" for="pck_av_us_no">{{__('No')}}</label>
                </div>
            </div>

            {{-- Activo --}}
            @include('livewire.commons.input_active_field')

        </div>
    </div>

    {{-- Logotipo  --}}
    @include('livewire.commons.input_logotipo_field')

</div>
