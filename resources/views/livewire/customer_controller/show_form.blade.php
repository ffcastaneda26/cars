<div id="layout-wrapper">
    <div class="account-pages">
        <div class="row justify-content-center">
            <div style="margin-top:20%">
                <p></p>
            </div>
            <div class="card" style="background-color:#EAE9DF;  border-radius: 25px;">
                <div class="card-body">
                    <div class="text-danger">
                        <x-jet-validation-errors></x-jet-validation-errors>
                    </div>
                    <div class="p-2">
                        <h5>{{ __('Complete the form to claim your coupon:') }}</h5>
                        <div class="mb-3">
                            <label class="text-uppercase" for="name">{{ __('First Name') }}</label>
                            <input type="text" wire:model="main_record.first_name" required
                                maxlength="40" class="form-control mb-2">
                        </div>
                        <div class="mb-3">
                            <label class="text-uppercase" for="lastname">{{ __('Last Name') }}</label>
                            <input type="text" wire:model="main_record.last_name" required
                                maxlength="40" class="form-control mb-2">
                        </div>
                        <div class="mb-3">
                            <label class="text-uppercase">{{ __('Email') }}</label>
                            <input type="email" wire:model="main_record.email" maxlength="100"
                                class="form-control mb-2">
                        </div>
                        <div class="mb-3">
                            <label class="text-uppercase" for="phone">{{ __('Phone') }}</label>
                            <input type="text" wire:model="main_record.phone" maxlength="10"
                                class="form-control mb-2">
                        </div>
                        <div class="mb-3">
                            <label class="text-uppercase" for="address">{{ __('Address') }}</label>
                            <input type="text" wire:model="main_record.address" maxlength="100"
                                class="form-control mb-2">
                        </div>
                        <div class="mb-3">
                            <label class="text-uppercase" for="zipcode">{{ __('Zipcode') }}</label>
                            <input type="text" wire:model="main_record.zipcode" wire:change="read_zipcode"
                                maxlength="5"
                                onkeypress="return only_numbers(event, this)"
                                class="form-control mb-2">
                        </div>
                        <div class="mb-3">
                            <label class="text-uppercase" for="city">{{ __('City') }}</label>
                            {{-- City --}}
                            @if ($main_record->zipcode)
                                <div class="flex-flex-column">
                                    <input type="text" wire:model="town_state" disabled
                                        class="form-control mb-4">
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="text-uppercase" for="gender">{{ __('Gender') }}</label>
                            <select wire:model="main_record.gender_id" class="form-select">
                                <option>{{ __('Select') }}</option>
                                @foreach ($genders as $gender)
                                    <option value="{{ $gender->id }}">
                                        @if (App::isLocale('en'))
                                            {{ $gender->english }}
                                        @else
                                            {{ $gender->spanish }}
                                        @endif
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="text-uppercase" for="ethnicity">{{ __('Ethnicity') }}</label>
                            <select wire:model="main_record.ethnicity_id" class="form-select">
                                <option>{{ __('Select') }}</option>
                                @foreach ($ethnicities as $ethnicity)
                                    <option value="{{ $ethnicity->id }}">
                                        @if (App::isLocale('en'))
                                            {{ $ethnicity->english }}
                                        @else
                                            {{ $ethnicity->spanish }}
                                        @endif
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="text-uppercase" for="age">{{ __('Age') }}</label>
                            <input type="number" wire:model="main_record.age" min="18" max="99"
                                class="form-control mb-2">
                        </div>

                        <div class="mb-3">
                            <label class="text-uppercase" for="ethnicity">{{ __('Coupon') }}</label>
                            <select wire:model="gift_id" class="form-select">
                                <option>{{ __('Select') }}</option>

                                @foreach ($promotion->gifts as $gift)
                                    <option value="{{ $gift->id }}">
                                        @if (App::isLocale('en'))
                                            {{ $gift->english }}
                                        @else
                                            {{ $gift->spanish }}
                                        @endif
                                @endforeach

                            </select>
                        </div>
                        <label class="text-uppercase">{{ __('Questions') }}</label>
                        @php
                            $dependent_question_index = 0;
                        @endphp
                        @if ($promotion && $promotion->questions)
                        {{-- Preguntas de la promoción --}}
                            @foreach ($promotion->questions->sortBy('order') as $question)
                                <div class="mb-1">
                                    @if (App::isLocale('en'))
                                        <strong>{{ $loop->index+1 }}.- {{ $question->english }}</strong>
                                    @else
                                        <strong>{{ $loop->index+1 }}.- {{ $question->spanish }}</strong>
                                    @endif
                                </div>

                                {{-- Opciones de la pregunta --}}
                                <select wire:model="option_id.{{ $loop->index }}"
                                        wire:change="read_option()"
                                        class="form-select">
                                    <option value="">{{ __('Select') }}</option>
                                    @foreach ($question->options as $option)
                                        <option value="{{ $option->id }}">
                                            @if (App::isLocale('en'))
                                                {{ $option->english }}
                                            @else
                                                {{ $option->spanish }}
                                            @endif
                                        </option>
                                    @endforeach
                                </select>
                            @endforeach

                            {{-- Si la opción tiene pregunta dependiente --}}
                            @if($option_record && $option_record->dependent_question )
                                <div wire:ignore>
                                    <label for="">
                                        @if (App::isLocale('en'))
                                            {{$option_record->dependent_question->english }}
                                        @else
                                            {{$option_record->dependent_question->spanish }}
                                        @endif
                                    </label>
                                    <select wire:model="dependent_options_ids.{{ $dependent_question_index }}"
                                        class="form-select">
                                        <option value="">{{ __('Select') }}</option>

                                        @foreach($option_record->dependent_question->options as $dependent_option)
                                            <option value="{{ $dependent_option->id }}">
                                                @if (App::isLocale('en'))
                                                    {{ $dependent_option->english }}
                                                @else
                                                    {{ $dependent_option->spanish }}
                                                @endif
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                            @error("option_id") <span class="text-danger">{{__('Please answer all questions')}}</span>@enderror
                        @endif

                        @if($question_error_message)
                            <div class="text-danger text-center">
                                <h5>{{ $question_error_message}}</h5>
                            </div>
                        @endif

                        {{-- Acepta las reglas? --}}
                        <div class="mt-1">
                            <input type="checkbox" wire:model="main_record.agree_be_rules" class="checkbox"
                                style="font-size: 1.2rem" required>
                            <label class="m-2">
                                <p>{{ __('I have read and accept') }} <u><a href="/" target="_blank"
                                        class="text-blue-500 text-underline"> {{ __(' the rules') }}</a></u></p>
                            </label>
                        </div>

                        {{-- Acepta ser mayor de edad? --}}
                        <div>
                            <input type="checkbox" wire:model="main_record.agree_be_legal_age" class="checkbox"
                                style="font-size: 1.2rem" required>
                            <label class="mt-2 m-2">{{ __('I am 18 years or older') }}
                            </label>
                        </div>

                        @if ($main_record->agree_be_rules && $main_record->agree_be_legal_age)
                            <div class="flex items-center justify-center mt-2">
                                <div class="text-center">
                                    <button class="btn" type="button" style="background-color: black; border-radius:2px;"
                                        wire:click.prevent="store()"
                                        >
                                        <strong class="text-uppercase text-white"
                                            style="font-size: 1.5rem">{{ __('Get Coupon') }}</strong>
                                    </button>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>