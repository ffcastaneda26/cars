<div>
    <div class="container">
        <x-jet-authentication-card-logo />
        <div class="card">
            <header class="card-header">
                <h2 class="card-header-title text-center capitalize">
                <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                    {{ __('Dude, protect your pack! Please change your password.') }}
                </h2>
            </header>
        </div>
        @if(!Auth::user()->change_password || $go_to_dashboard)
            <div class="row">
                <div class="d-flex justify-content-center">

                    <div class="card">

                        <div class="d-flex justify-content-end">
                            <a href="/">
                                <x-jet-button>
                                        {{ __('Dashboard') }}
                                </x-jet-button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @else

            <x-jet-validation-errors class="mb-3" />
            <div class="row">
                <div class="col-xl-4">

                </div>
                <div class="col-xl-4 card">
                    <div class="mb-3 mt-4">
                        <x-jet-label value="{{ __('Email') }}" />

                        <x-jet-input class="{{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email"
                            wire:model="email"
                            disabled />
                        <x-jet-input-error for="email"></x-jet-input-error>
                    </div>

                    <div class="mb-3">
                        <x-jet-label value="{{ __('Password') }}" />

                        <x-jet-input class="{{ $errors->has('password') ? 'is-invalid' : '' }}" type="password"
                            wire:model="password" name="password" required autocomplete="new-password" />
                        <x-jet-input-error for="password"></x-jet-input-error>
                    </div>

                    <div class="mb-3">
                        <x-jet-label value="{{ __('Confirm Password') }}" />

                        <x-jet-input class="{{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" type="password"
                            wire:model="password_confirmation" name="password_confirmation" required
                            autocomplete="new-password" />
                        <x-jet-input-error for="password_confirmation"></x-jet-input-error>
                    </div>

                    <div class="mb-5">
                        <div class="d-flex justify-content-end">
                            <x-jet-button wire:click="reset_password">
                                {{ __('Reset Password') }}
                            </x-jet-button>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">

                </div>

            </div>
        @endif
    </div>
</div>
