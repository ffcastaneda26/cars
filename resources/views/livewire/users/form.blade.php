<div class="container">
    <x-jet-validation-errors></x-jet-validation-errors>
    <div class="row align-items-start">
        {{-- Etiquetas de Campos --}}
        <div class="w-auto flex flex-col">
            <label class="input-group-text mb-2">{{ __('First Name') }}</label>
            <label class="input-group-text mb-2">{{ __('Last Name') }}</label>
            <label class="input-group-text mb-2">{{ __('Email') }}</label>
            <label class="input-group-text mb-2">{{ __('Role') }}</label>
            <label class="input-group-text mb-2">{{ __('Password') }}</label>
            <label class="input-group-text mb-2">{{ __('Confirm') }}</label>
            @if(isset($record->id))
                <label class="input-group-text mb-2">{{ __('Active?') }}</label>
            @endif
        </div>

        <div class="col flex flex-col">
            {{-- Nombre --}}
            <div class="flex-flex-column">
                <input type="text" wire:model="first_name" required placeholder="{{ __('First Name') }}"
                    class="form-control mb-2" maxlength="60"
                    @if(isset($record->id))
                        disabled
                    @endif
                >
            </div>

            {{-- Apellido --}}
            <div class="flex-flex-column">
                <input type="text" wire:model="last_name" required placeholder="{{ __('Last Name') }}"
                    class="form-control mb-2" maxlength="60"
                    @if(isset($record->id) && !$record->wolf)
                        disabled
                    @endif
                >
            </div>

            {{-- Correo Electrónico --}}
            <div class="flex-flex-column">
                <input type="text"
                        wire:model="email"
                        maxlength="50"
                        placeholder="{{ __('Email') }}"
                        class="form-control mb-2"
                        @if(isset($record->id))
                            disabled
                        @endif
                    >
            </div>


            {{-- Rol --}}
            <div class="flex-flex-column">
                <select wire:model="role_id"
                        class="form-select form-select-md  rounded w-auto mb-2"
                >
                    <option>{{ __('Role') }}</option>

                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">
                            {{ App::isLocale('en') ? $role->english : $role->spanish  }}
                        </option>
                    @endforeach
                </select>
            </div>


            {{-- Contraseña --}}
                <div class="flex-flex-column">
                    <input type="password" wire:model="password" maxlength="50" placeholder="{{ __('Password') }}"
                        class="form-control mb-2">
                </div>


                {{-- Confrimar Contraseña --}}
                <div class="flex-flex-column">
                    <input type="password" wire:model="password_confirmation" maxlength="50" placeholder="{{ __('Confirm') }}"
                    class="form-control mb-2">
                </div>


            {{-- ¿Activo? --}}

            @if(isset($record->id))
                <div class="flex-flex-column">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" wire:model="active" class="btn-check" name="type" id="active" value="1">
                        <label class="btn btn-outline-success" for="active">{{__('Active')}}</label>

                        <input type="radio" wire:model="active" class="btn-check" name="type" id="inactive" value="0">
                        <label class="btn btn-outline-danger" for="inactive">{{__('Inactive')}}</label>

                    </div>
                </div>
            @endif

        </div>

    </div>
</div>
