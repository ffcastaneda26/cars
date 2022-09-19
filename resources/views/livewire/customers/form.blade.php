<div class="container">
    <div class="row align-items-start">
        <div class="col-md-4 flex flex-col">
            <label class="input-group-text mb-2">{{__("First Name")}}</label>
            @error('main_record.first_name')<div class="mb-2"><br></div>@enderror

            <label class="input-group-text mb-2">{{__("Last Name")}}</label>
            @error('main_record.last_name')<div class="mb-2"><br></div>@enderror

            <label class="input-group-text mb-2">{{__("Email")}}</label>
            @error('email')<div class="mb-2"><br></div>@enderror

            <label class="input-group-text mb-2">{{__("Phone")}}</label>
            @error('main_record.phone')<div class="mb-2"><br></div>@enderror
            <label class="input-group-text mb-2">{{__("Address")}}</label>
            @error('main_record.address')<div class="mb-2"><br></div>@enderror


            <label class="input-group-text mb-2">{{__("Zipcode")}}</label>
            @error('main_record.zipcode')<div class="mb-2"><br></div>@enderror

            @if($main_record->zipcode)
                <label class="input-group-text mb-2">{{__("City")}}</label>
            @endif

            <label class="input-group-text mb-2">{{__("Gender")}}</label>
            @error('main_record.gender')<div class="mb-2"><br></div>@enderror

            <label class="input-group-text mb-4">{{__("Ethnicity")}}</label>
            @error('main_record.gender')<div class="mb-2"><br></div>@enderror

        </div>

        <div class="col flex flex-col">
            {{-- Nombre --}}
            <div class="flex-flex-column">
                <input type="text"
                        wire:model="main_record.first_name"
                        required
                        placeholder="{{__("First Name")}}"
                        maxlength="40"
                        class="form-control mb-2"
                >
                <div class="mb-2">@error('main_record.first_name') <span class="text-danger">{{ $message }}</span>@enderror</div>

            </div>

            {{-- Apellido --}}
            <div class="flex-flex-column">
                <input type="text"
                        wire:model="main_record.last_name"
                        required
                        placeholder="{{__("Last Name")}}"
                        maxlength="40"
                        class="form-control mb-2"
                >
                <div class="mb-2">@error('main_record.last_name') <span class="text-danger">{{ $message }}</span>@enderror</div>

            </div>

            {{-- Correo --}}
            <div class="flex-flex-column">

                <input type="email"
                        wire:model="email"
                        maxlength="100"
                        placeholder="{{__("Email")}}"
                        class="form-control mb-2"
                >
                <div class="mb-2">@error('main_record.email') <span class="text-danger">{{ $message }}</span>@enderror</div>

            </div>

            {{-- Teléfono --}}
            <div class="flex-flex-column">

                <input type="text"
                        wire:model="main_record.phone"
                        maxlength="10"
                        placeholder="{{__("Phone")}}"
                        class="form-control mb-2"
                >
                <div class="mb-2">@error('main_record.phone') <span class="text-danger">{{ $message }}</span>@enderror</div>

            </div>

            {{-- Address --}}
            <div class="flex-flex-column">
                <input type="text"
                        wire:model="main_record.address"
                        maxlength="100"
                        placeholder="{{__("Address")}}"
                        class="form-control mb-2"
                >
                <div class="mb-2">@error('main_record.address') <span class="text-danger">{{ $message }}</span>@enderror</div>

            </div>

            {{-- Zipcode --}}
            <div class="flex-flex-column">
                <input type="text"
                        wire:model="main_record.zipcode"
                        wire:change="read_zipcode"
                        maxlength="10"
                        placeholder="{{__("ZipCode")}}"
                        class="form-control mb-2"
                >
                <div class="mb-2">@error('main_record.zipcode') <span class="text-danger">{{ $message }}</span>@enderror</div>

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

            {{-- Género --}}
            <div class="flex-flex-column mt-2">
                <div class="d-flex justify-content-between mb-4">
                    <div class="ml-5">
                        <label class="bg-primary">{{ __('Male') }}</label>
                        <input type="radio"
                                wire:model="main_record.gender"
                                value="Male">
                    </div>

                    <div class="ml-5">
                        <label style="background-color:pink">{{ __('Female') }}</label>
                        <input type="radio"
                                wire:model="main_record.gender"
                            value="Female">
                    </div>

                    <div class="ml-5">
                        <label class="bg-secondary">{{ __('Other') }}</label>
                        <input type="radio"
                                wire:model="main_record.gender"
                                value="Other">
                    </div>
                </div>
            </div>

            {{-- Etnia --}}
            <div class="flex-flex-column">
                <select wire:model="main_record.ethnicity_id"
                        class="form-select form-select-md  rounded w-auto mb-2"
                >
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


        </div>
    </div>

    {{-- Acepta ser mayor de edad? --}}


    <div class="row align-items-start">
        <label class="mt-2">{{__("I agree to be of legal age")}}
            <input type="checkbox"
                    wire:model="main_record.agree_be_legal_age"
                    class="checkbox"
            >
        </label>

        <div class="mb-2">@error('main_record.agree_be_legal_age') <span class="text-danger">{{ $message }}</span>@enderror</div>
    </div>
</div>
