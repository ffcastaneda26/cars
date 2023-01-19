<div class="card">
    <form method="POST" action="{{ route('register') }}">
        @csrf
        {{-- Nombre --}}
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">{{ __('First Name') }}</span>
    
            <x-jet-input id="first_name"
                    class="form-control"
                    type="text"
                    name="first_name"
                    :value="old('first_name')"
                    required
                    autofocus 
            />
        </div>

        {{-- Apellido --}}
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">{{ __('Last Name') }}</span>
    
            <x-jet-input id="last_name"
                    class="form-control"
                    type="text"
                    name="last_name"
                    :value="old('last_name')"
                    required
            />
        </div>

        {{-- Correo Electrónico --}}
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">{{ __('Email') }}</span>
    
            <x-jet-input id="email"
                    class="form-control"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
            />
        </div>

        {{-- Teléfono --}}
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">{{ __('Phone') }}</span>
    
            <x-jet-input id="phone"
                    class="form-control"
                    type="text"
                    name="phone"
                    :value="old('phone')"
                    required
            />
        </div>

        {{-- Password --}}
        <div class="input-group mb-3">
            <span class="input-group-text w-20" id="basic-addon1">{{ __('Password') }}</span>
            <x-jet-input id="password"
                    class="form-control"
                    type="password"
                    name="password"
                    required
                    autocomplete="new-password"
            />
        </div>


        {{-- Confirmación de Password --}}

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">{{ __('Confirm Password') }}</span>
            <x-jet-input id="password_confirmation"
                    class="form-control"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
            />
        </div>



        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <div class="mt-2">
                <x-jet-label for="terms">
                    <div class="flex items-center">
                        <x-jet-checkbox name="terms" id="terms"/>

                        <div class="ml-2">
                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                            ]) !!}
                        </div>
                    </div>
                </x-jet-label>
            </div>
        @endif

        <div class="flex items-center justify-end mt-2">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-jet-button class="ml-4">
                {{ __('Register') }}
            </x-jet-button>
        </div>
    </form>
</div>