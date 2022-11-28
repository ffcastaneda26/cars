<div class="container">
    <x-jet-validation-errors></x-jet-validation-errors>
    <div class="row align-items-start">
        <div class="col-md-6 flex flex-col">
            <label class="input-group-text mb-2">{{ __('Name') }}</label>
            <label class="input-group-text mb-2">{{ __('Position') }}</label>
            <label class="input-group-text mb-2">{{ __('Job Type') }}</label>
            <label class="input-group-text mb-2">{{ __('Shift') }}</label>

            <label class="input-group-text mb-2">{{ __('Show Salary By') }}</label>
            <label class="input-group-text mb-2">{{ __('Minimum') }}</label>
            <label class="input-group-text mb-2">{{ __('Maximum') }}</label>
            <label class="input-group-text mb-2">{{ __('Amount') }}</label>
            <label class="input-group-text mb-2">{{ __('Periodicity') }}</label>
            <label class="input-group-text mb-2">{{ __('Years Experience') }}</label>
             <label class="input-group-text mb-2">{{ __('Experience Mandatory') }}</label>
            <label class="input-group-text mb-2">{{ __('Time To Hire') }}</label>
            <label class="input-group-text mb-2">{{ __('Quantity Jobs') }}</label>
            <label class="input-group-text mb-2">{{ __('Remote') }}</label>
            <label class="input-group-text mb-2">{{ __('Show Address') }}</label>
            <label class="input-group-text mb-2">{{ __('Applicants Send CV') }}</label>
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
                    <select class="form-select mb-2" wire:model="main_record.job_type_id">
                        <option value="">{{ __('Job Type') }}</option>
                        @foreach ($job_types as $job_type_select)
                            <option value="{{ $job_type_select->id }}">
                                {{ App::isLocale('en') ? $job_type_select->english :  $job_type_select->spanish }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Turno --}}
                <div class="flex-flex-column">
                    <select class="form-select mb-2" wire:model="main_record.shift">
                        <option value="">{{ __('Shift') }}</option>
                        <option value="morning">{{ __('Morning') }}</option>
                        <option value="evening">{{ __('Evening') }}</option>
                        <option value="night">{{ __('Night') }}</option>
                        <option value="mixed">{{ __('Mixed') }}</option>
                        <option value="varied">{{ __('Varied') }}</option>


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
                <div class="flex-flex-column mt-2 mb-2">
                    <select class="form-select" wire:model="main_record.times_hire_id">
                        <option value="">{{ __('Time to Hire') }}</option>
                        @foreach ($time_hires as $time_to_hire_select)
                            <option value="{{ $time_to_hire_select->id }}">
                                {{ App::isLocale('en') ? $time_to_hire_select->english :  $time_to_hire_select->spanish }}
                            </option>
                        @endforeach
                    </select>

                </div>

                {{-- Cantidad de vacantes --}}
                <div class="flex-flex-column">
                    <input type="number"
                            wire:model="main_record.quantity_jobs"
                    >
                </div>

                {{-- Remoto  --}}
                <div class="flex-flex-column mt-3">
                     <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio"
                                wire:model="remote"
                                class="btn-check"
                                name="remote"
                                id="remote_yes"
                                value="1">
                        <label class="btn btn-outline-success" for="remote_yes">{{__('Yes')}}</label>

                        <input type="radio"
                                wire:model="remote"
                                class="btn-check"
                                name="remote"
                                id="remote_no"
                                value="0">
                        <label class="btn btn btn-outline-danger" for="remote_no">No</label>
                    </div>
                </div>

                {{-- Mostrar Dirección   --}}
                <div class="flex-flex-column mt-2">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                       <input type="radio"
                               wire:model="show_address"
                               class="btn-check"
                               name="show_address"
                               id="show_address_yes"
                               value="1">
                       <label class="btn btn-outline-success" for="show_address_yes">{{__('Yes')}}</label>

                       <input type="radio"
                               wire:model="show_address"
                               class="btn-check"
                               name="show_address"
                               id="show_address_no"
                               value="0">
                       <label class="btn btn btn-outline-danger" for="show_address_no">No</label>
                   </div>
               </div>

                {{-- Cantidatos enviar CV  --}}
                <div class="flex-flex-column mt-2">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                       <input type="radio"
                               wire:model="applicants_send_cv"
                               class="btn-check"
                               name="applicants_send_cv"
                               id="applicants_send_cv_yes"
                               value="1">
                       <label class="btn btn-outline-success" for="applicants_send_cv_yes">{{__('Yes')}}</label>

                       <input type="radio"
                               wire:model="applicants_send_cv"
                               class="btn-check"
                               name="applicants_send_cv"
                               id="applicants_send_cv_no"
                               value="0">
                       <label class="btn btn btn-outline-danger" for="applicants_send_cv_no">No</label>
                   </div>
               </div>
            </form>
        </div>
    </div>
</div>
