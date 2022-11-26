<div class="container">
    <x-jet-validation-errors></x-jet-validation-errors>
    <div class="row align-items-start">
        <div class="col-md-5 flex flex-col">
            <label class="input-group-text mb-2">{{ __('Name') }}</label>
            <label class="input-group-text mb-2">{{ __('Position') }}</label>
            <label class="input-group-text mb-2">{{ __('Job Type') }}</label>
            <label class="input-group-text mb-2">{{ __('Show Salary By') }}</label>
            <label class="input-group-text mb-2">{{ __('Minimum') }}</label>
            <label class="input-group-text mb-2">{{ __('Maximum') }}</label>
            <label class="input-group-text mb-2">{{ __('Amount') }}</label>
            <label class="input-group-text mb-2">{{ __('Periodicity') }}</label>
            <label class="input-group-text mb-2">{{ __('Years Experience') }}</label>
             <label class="input-group-text mb-2">{{ __('Experience Mandatory') }}</label>
            <label class="input-group-text mb-2">{{ __('Time To Hire') }}</label>
           {{--  <label class="input-group-text mb-2">{{ __('Quantity Jobs') }}</label>
            <label class="input-group-text mb-2">{{ __('Remote') }}</label>
            <label class="input-group-text mb-2">{{ __('Show Address') }}</label>
            <label class="input-group-text mb-2">{{ __('Applicnts Send CV') }}</label>
            <label class="input-group-text mb-2">{{ __('Notify Daily') }}</label>
            <label class="input-group-text mb-2">{{ __('Notify Each Application') }}</label>
            <label class="input-group-text mb-2">{{ __('Mandatory English') }}</label>
            <label class="input-group-text mb-2">{{ __('Cumplies Legal Requirements') }}</label>
            <label class="input-group-text mb-2">{{ __('Zipcode') }}</label> --}}

            @if($main_record->zipcode)
                <label class="input-group-text mb-2">{{__("City")}}</label>
            @endif

            <label class="input-group-text mb-2">{{ __('Active') }}</label>
        </div>

        <div class="col flex flex-col">
            <form>
                {{-- Nombre --}}
                <div class="flex-flex-column">
                    <input type="text" wire:model="main_record.name"
                    maxlength="150"
                    name="name"
                    placeholder="{{__("Name")}}"
                    class="form-control mb-2">
                </div>

                {{-- Position --}}
                <div class="flex-flex-column">
                    <select class="form-select mb-2" wire:model="main_record.position_id">
                        <option value="">{{ __('Position') }}</option>
                        @foreach ($positions as $position_select)
                            <option value="{{ $position_select->id }}">
                                {{ App::isLocale('en') ? $position_select->english :  $position_select->spanish }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Tipo de trabajo --}}
                <div class="flex-flex-column">
                    <select class="form-select mb-2" wire:model="main_record.time_type_id">
                        <option value="">{{ __('Job Type') }}</option>
                        @foreach ($time_types as $time_type_select)
                            <option value="{{ $time_type_select->id }}">
                                {{ App::isLocale('en') ? $time_type_select->english :  $time_type_select->spanish }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Mostrar Salario por --}}
                <div class="flex-flex-column">
                    <select class="form-select mb-2" wire:model="main_record.show_salary_by">
                    <option value="range">{{__('Range')}}</option>
                    <option value="initial">{{__('Initial')}}</option>
                    <option value="minimum">{{__('Minimum')}}</option>
                    <option value="maximum">{{__('Maximum')}}</option>
                    <option value="amount">{{__('Exactly')}}</option>
                </div>

                {{-- Mínimo --}}
                <div class="flex-flex-column">
                    <input type="text"
                        wire:model="main_record.min_salary"
                        maxlength="30"
                        placeholder="{{__("Minimum")}}"
                        class="form-control mb-2"
                    >
                </div>

                {{-- Máximo --}}
                <div class="flex-flex-column">
                    <input type="text"
                        wire:model="main_record.max_salary"
                        maxlength="30"
                        placeholder="{{__("Maximum")}}"
                        class="form-control mb-2"
                    >
                </div>

                {{-- Importe --}}
                <div class="flex-flex-column">
                    <input type="text"
                        wire:model="main_record.amount_salary"
                        maxlength="30"
                        placeholder="{{__("Maximum")}}"
                        class="form-control mb-2"
                    >
                </div>

                {{-- Periodicidad --}}
                <div class="flex-flex-column">
                    <select class="form-select mb-2" wire:model="salary_periodicity">
                        <option value="range">{{__('Hour')}}</option>
                        <option value="initial">{{__('Day')}}</option>
                        <option value="minimum">{{__('Week')}}</option>
                        <option value="maximum">{{__('Month')}}</option>
                        <option value="amount">{{__('Year')}}</option>
                </div>

                {{-- Años de experiencia --}}
                <div class="flex-flex-column">
                    <input type="number"
                            wire:model="main_record.years_experience"
                    >
                </div>

                {{-- Experiencia Obligatoria --}}
                <div class="flex-flex-column mt-3">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio"
                                wire:model="mandatory_experience"
                                class="btn-check"
                                name="mandatory_experience"
                                id="mandatory_experience_yes"
                                value="1">
                        <label class="btn btn-outline-success" for="mandatory_experience_yes">{{__('Yes')}}</label>

                        <input type="radio"
                                wire:model="mandatory_experience"
                                class="btn-check"
                                name="mandatory_experience"
                                id="mandatory_experience_no"
                                value="0">
                        <label class="btn btn btn-outline-danger" for="mandatory_experience_no">No</label>
                    </div>
                </div>

                {{-- Tiempo para contratar --}}
                <div class="flex-flex-column">
                    <select class="form-select mb-2" wire:model="time_to_hire">
                        <option value="range">{{__('Range')}}</option>
                        <option value="">{{__('Initial')}}</option>
                        <option value="minimum">{{__('Minimum')}}</option>
                        <option value="maximum">{{__('Maximum')}}</option>
                        <option value="amount">{{__('Exactly')}}</option>
                </div>

                {{-- Cantidad de vacantes --}}
                <div class="flex-flex-column">
                    <label for="">number: quantity_jobs</label>
                </div>

                {{-- Remoto  --}}
                <div class="flex-flex-column">
                    <label for="">Checkbox: remote</label>
                </div>

                {{-- Mostrar Dirección   --}}
                <div class="flex-flex-column">
                    <label for="">Checkbox: show_address</label>
                </div>

                {{-- Cantidatos enviar CVn   --}}
                <div class="flex-flex-column">
                    <label for="">Checkbox: applicants_send_cv</label>
                </div>

                {{-- Notificar diariamente   --}}
                <div class="flex-flex-column">
                    <label for="">Checkbox: notify_daily_applications</label>
                </div>

                {{-- Notificar Cada aplicación   --}}
                <div class="flex-flex-column">
                    <label for="">Checkbox: notify_each_application</label>
                </div>

                {{-- Inglés Obligatorio   --}}
                <div class="flex-flex-column">
                    <label for="">Checkbox: mandatory_english</label>
                </div>

                {{-- Cumple con los requerimientos legales  --}}
                <div class="flex-flex-column">
                    <label for="">Checkbox: complies_legal_requirements</label>
                </div>


                {{-- Direccion --}}
                <div class="flex-flex-column">
                    <input type="text"
                    wire:model="main_record.address"
                    maxlength="30"
                    placeholder="{{__("Address")}}"
                    class="form-control mb-2">
                </div>

                {{-- Codigo postal --}}
                <div class="flex-flex-column">
                    <input type="text"
                        wire:model="main_record.zipcode"
                        wire:change="read_zipcode"
                        maxlength="5"
                        onkeypress="return only_numbers(event, this)"
                        class="form-control mb-2"
                    >
                </div>

                {{-- City --}}
                @if($main_record->zipcode)
                    <div class="flex-flex-column">
                        <input type="text"
                            wire:model="town_state"
                            disabled
                            class="form-control mb-2"
                        >
                    </div>
                @endif

                {{-- ¿Activo? --}}
                <div class="flex-flex-column">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" wire:model="active" class="btn-check" name="type" id="active" value="1">
                        <label class="btn btn-outline-success" for="active">{{__('Active')}}</label>

                        <input type="radio" wire:model="active" class="btn-check ml-4" name="type" id="inactive" value="0">
                        <label class="btn btn-outline-danger" for="inactive">{{__('Inactive')}}</label>
                    </div>
                </div>
            </form>
        </div>


        {{-- Descripción --}}

        <div class="row align-items-start">
            <div class="col-lg-6">
                <label class="form-label">{{ __('Description') }}</label>
                    <textarea type="textarea"
                                wire:model="main_record.description"
                                required
                                placeholder="{{ __('Description') }}";
                                class="form-control mb-2"
                                rows="2"
                                style="resize: none"
                    >
                    </textarea>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
            </div>
        </div>

        {{-- Beneficios --}}
        <div class="row align-items-start">
            <div class="col-lg-6">
                <label class="form-label">{{ __('Benefits') }}</label>
                    <textarea type="textarea"
                                wire:model="main_record.benefits"
                                required
                                placeholder="{{ __('Benefits') }}";
                                class="form-control mb-2"
                                rows="2"
                                style="resize: none">
                    </textarea>
                    @error('benefits')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
            </div>
        </div>

        {{-- Precauciones para Covid --}}
        <div class="row align-items-start">
            <div class="col-lg-6">
                <label class="form-label">{{ __('Covid Precautions') }}</label>
                    <textarea type="textarea"
                                wire:model="main_record.covid_precautions"
                                required
                                placeholder="{{ __('Covid Precautions') }}";
                                class="form-control mb-2"
                                rows="2"
                                style="resize: none">
                    </textarea>
                    @error('covid_precautions')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
            </div>
        </div>

        {{-- Image  --}}
        <div class="row align-items-start">
            <div class="col-lg-10  col-md-8 mb-4">
                <label class="fs-5">{{ __('Image') }}</label>
                <input type="file" wire:model="file_path" class="form-control">
            </div>
            <div class="col-lg-8">
                @if (isset($image))
                    {{__('Preview')}}
                    <img src="{{ $file_path->temporaryUrl() }}" class="avatar-md">
                @endif
            </div>
        </div>

    </div>
</div>
