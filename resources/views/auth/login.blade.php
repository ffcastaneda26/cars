<x-guest-layout>

            <x-jet-authentication-card>
                <x-slot name="logo">
                    {{-- <x-jet-authentication-card-logo /> --}}
                    <img class="rounded-xs" src="{{asset('images/logo.png')}}" alt="" height="260px" width="260px">
                </x-slot>

                <x-jet-validation-errors class="mb-4" />

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif


                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div>
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" required autofocus />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="password" value="{{ __('Password') }}" />
                        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                    </div>

                    <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-jet-checkbox id="remember_me" name="remember"  checked class="hidden"/>
                            <span class="ml-2 text-sm hidden">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        @if (Route::has('register'))
                              <x-jet-button class="btn boton-cuervo">
                                <a href="{{ route('register') }}" >{{ __('Register') }}</a>
                            </x-jet-button>
                        @endif

                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        <div class="d-flex justify-content-right">
                            <x-jet-button>
                                {{ __('Log in') }}
                            </x-jet-button>
                        </div>
                    </div>
                </form>
            </x-jet-authentication-card>
        </div>

</x-guest-layout>

