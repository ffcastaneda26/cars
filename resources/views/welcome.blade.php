<html lang="en"><head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin &amp; Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.typekit.net/xdc8egp.css">
    <style>
        h4{
            font-family: prenton-condensed, sans-serif;
            font-weight: 400;
            font-style: normal;
        }
        label{
            font-family: prenton-condensed, sans-serif;
            font-weight: 700;
            font-style: normal;
        }
    </style>
</head>

<body>

    <!-- Loader -->
        <div id="preloader" style="display: none;"><div id="status" style="display: none;"><div class="spinner"></div></div></div>

    <!-- Begin page -->
    <div class="accountbg" style="background-image: url('assets/images/bg_completed.png');"></div>
    <div class="account-pages" style="margin-top: 22%;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="card" style="max-width: 32rem; background-color:#EAE9DF; border-radius: 25px;">
                    <div class="card-body">
                        <div class="p-2">
                            <h4 class="text-center">{{__('Complete the Form to claim your coupon:')}}</h4>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="name">{{ __('First Name') }}</label>
                                    <input type="text"
                                        //wire:model="main_record.first_name"
                                        required
                                        placeholder="{{__("First Name")}}"
                                        maxlength="40"
                                        class="form-control mb-2"
                                    >
                                </div>
                                <div class="mb-3">
                                    <label for="lastname">{{ __('Last Name') }}</label>
                                    <input type="text"
                                        //wire:model="main_record.last_name"
                                        required
                                        placeholder="{{__("Last Name")}}"
                                        maxlength="40"
                                        class="form-control mb-2"
                                    >
                                </div>
                                <div class="mb-3">
                                    <label for="email">{{ __('Email') }}</label>
                                    <input type="email"
                                        //wire:model="email"
                                        maxlength="100"
                                        placeholder="{{__("Email")}}"
                                        class="form-control mb-2"
                                    >
                                </div>
                                <div class="mb-3">
                                    <label for="phone">{{ __('Phone') }}</label>
                                    <input type="text"
                                        //wire:model="main_record.phone"
                                        maxlength="10"
                                        placeholder="{{__("Phone")}}"
                                        class="form-control mb-2"
                                    >
                                </div>
                                <div class="mb-3">
                                    <label for="address">{{ __('Address') }}</label>
                                    <input type="text"
                                        //wire:model="main_record.address"
                                        maxlength="100"
                                        placeholder="{{__("Address")}}"
                                        class="form-control mb-2"
                                    >
                                </div>
                                <div class="mb-3">
                                    <label for="zipcode">{{ __('Zipcode') }}</label>
                                    <input type="text"
                                        //wire:model="main_record.zipcode"
                                        wire:change="read_zipcode"
                                        maxlength="10"
                                        placeholder="{{__("ZipCode")}}"
                                        class="form-control mb-2"
                                    >
                                </div>
                                <div class="mb-3">
                                    <label for="city">{{ __('City') }}</label>
                                    {{-- City --}}
                                    {{--  @if($main_record->zipcode)
                                        <div class="flex-flex-column">
                                            <input type="text"
                                                //wire:model="town_state"
                                                disabled
                                                class="form-control mb-4"
                                            >
                                        </div>
                                    @endif  --}}
                                </div>
                                <div class="mb-3">
                                    <label for="gender">{{ __('Gender') }}</label>
                                    <select //wire:model="main_record.gender_id"
                                        class="form-select">
                                        <option>{{ __('Select') }}</option>
                                       {{--   @foreach ($genders as $gender)
                                            <option value="{{ $gender->id }}">
                                                @if (App::isLocale('en'))
                                                    {{ $gender->english }}
                                                @else
                                                    {{ $gender->spanish }}
                                                @endif
                                            </option>
                                        @endforeach  --}}
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="ethnicity">{{ __('Ethnicity') }}</label>
                                    <select //wire:model="main_record.ethnicity_id"
                                        class="form-select">
                                        <option>{{ __('Select') }}</option>
                                        {{--  @foreach ($ethnicities as $ethnicity)
                                            <option value="{{ $ethnicity->id }}">
                                                @if (App::isLocale('en'))
                                                    {{ $ethnicity->english }}
                                                @else
                                                    {{ $ethnicity->spanish }}
                                                @endif
                                            </option>
                                        @endforeach  --}}
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="age">{{ __('Age') }}</label>
                                    <input type="number"
                                        //wire:model="main_record.age"
                                        min="18"
                                        max="99"
                                        placeholder="{{__("Age")}}"
                                        class="form-control mb-2"
                                    >
                                </div>
                                {{-- Acepta las reglas? --}}
                                <div class="mb-3">
                                    <input type="checkbox"
                                        //wire:model="main_record.agree_be_legal_age"
                                        class="checkbox">
                                    <label>{{__("I have read and accept the rules")}}
                                    </label>
                                </div>
                                {{-- Acepta ser mayor de edad? --}}
                                <div class="mb-3">
                                    <input type="checkbox"
                                        //wire:model="main_record.agree_be_legal_age"
                                        class="checkbox">
                                    <label class="mt-2">{{__("I am 18 years or older")}}
                                    </label>
                                </div>
                                <div class="flex items-center justify-center mt-2">
                                    <div class="text-center">
                                        <button class="btn btn-dark waves-effect waves-light" type="submit">
                                            <strong class="uppercase">{{ __('Get Coupon') }}</strong>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>
</html>
