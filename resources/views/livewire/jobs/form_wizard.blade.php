<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                @if(!empty($successMessage))
                    <div class="alert alert-success">
                        {{ $successMessage }}
                    </div>
                @endif
                <form id="form-horizontal" class="form-horizontal form-wizard-wrapper wizard clearfix" role="application">
                    <div class="stepwizard">
                        <div class="stepwizard-row setup-panel">
                            <div class="stepwizard-step">
                                <a href="#step-1" type="button" class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-primary' }}">1</a>
                                <p>{{__('Step')}} 1</p>
                            </div>
                            <div class="stepwizard-step">
                                <a href="#step-2" type="button" class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-primary' }}">2</a>
                                <p>{{__('Step')}} 2</p>
                            </div>
                            <div class="stepwizard-step">
                                <a href="#step-3" type="button" class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-primary' }}">3</a>
                                <p>{{__('Step')}} 3</p>
                            </div>
                            <div class="stepwizard-step">
                                <a href="#step-4" type="button" class="btn btn-circle {{ $currentStep != 4 ? 'btn-default' : 'btn-primary' }}" disabled="disabled">4</a>
                                <p>{{__('Step')}} 4</p>
                            </div>
                        </div>
                    </div>
                    {{--  Multi Steps 1  --}}
                    <div class="row setup-content {{ $currentStep != 1 ? 'displayNone' : '' }}" id="step-1">
                        <div class="col-xs-12">
                            <div class="col-md-4">
                                <h3></h3>
                                <div class="form-group">
                                    <label for="title">{{__('Name')}}</label>
                                    <input type="text" wire:model="name"
                                    maxlength="150"
                                    name="name"
                                    placeholder="{{__("Name")}}"
                                    class="form-control mb-2">
                                    @error('name') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">{{__('Position')}}</label>
                                    <select class="form-select mb-2" wire:model="position_id">
                                        <option value="">{{ __('Position') }}</option>
                                        @foreach ($positions as $position_select)
                                            <option value="{{ $position_select->id }}">
                                                {{ App::isLocale('en') ? $position_select->english :  $position_select->spanish }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('position_id') <span class="error">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-group">
                                    <label for="description">{{__('Job Type')}}</label>
                                    <select class="form-select mb-2" wire:model="job_type_id">
                                        <option value="">{{ __('Job Type') }}</option>
                                        @foreach ($job_types as $job_type_select)
                                            <option value="{{ $job_type_select->id }}">
                                                {{ App::isLocale('en') ? $job_type_select->english :  $job_type_select->spanish }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('job_type_id') <span class="error">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-group">
                                    <label for="description">{{__('Salary Type')}}</label>
                                    <select class="form-select mb-2" wire:model="salary_type_id">
                                        <option value="">{{ __('Job Type') }}</option>
                                        @foreach ($salary_types as $salary_type_select)
                                            <option value="{{ $salary_type_select->id }}">
                                                {{ App::isLocale('en') ? $salary_type_select->english :  $salary_type_select->spanish }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('salary_type_id') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label class="block m-1">{{ __('Remote') }}</label>
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
                                    @error('remote') <span class="error">{{ $message }}</span> @enderror

                                </div>
                                <button class="btn btn-primary nextBtn btn-lg pull-right" wire:click="firstStepSubmit" type="button" >Next</button>
                            </div>
                        </div>
                    </div>


                    {{--  Multi Steps 2  --}}
                    <div class="row setup-content {{ $currentStep != 2 ? 'displayNone' : '' }}" id="step-2">
                        <div class="col-xs-12">
                            <div class="col-md-4">
                                <h3></h3>
                                <div class="form-group">
                                    <label for="description">{{ __('Show Salary By') }}</label><br/>
                                    <select class="form-select mb-2" wire:model="show_salary_by">
                                        <option value="range">{{__('Range')}}</option>
                                        <option value="initial">{{__('Initial')}}</option>
                                        <option value="maximum">{{__('Maximum')}}</option>
                                        <option value="exactly">{{__('Exactly')}}</option>
                                    </select>
                                    @error('show_salary_by') <span class="error">{{ $message }}</span> @enderror
                                </div>

                                @if ($show_salary_by == 'range')
                                    <div class="row">
                                        {{-- Mínimo --}}
                                        <div class="col-md-4">
                                            <label for="description">{{ __('Minimum') }}</label><br/>
                                            <div class="flex-flex-column">
                                                <input type="text"
                                                    wire:model="min_salary"
                                                    maxlength="30"
                                                    placeholder="{{__("Minimum")}}"
                                                    class="form-control mb-2"
                                                >
                                                @error('min_salary') <span class="error">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        {{-- Máximo --}}
                                        <div class="col-md-4">
                                            <label for="description">{{ __('Maximum') }}</label><br/>
                                            <div class="flex-flex-column">
                                                <input type="text"
                                                    wire:model="max_salary"
                                                    maxlength="30"
                                                    placeholder="{{__("Maximum")}}"
                                                    class="form-control mb-2"
                                                >
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    {{-- Máximo, Exacto o Inicial --}}
                                    <label for="description">{{ __('Amount') }}</label><br/>
                                    <div class="form-group">
                                        <input type="text"
                                            wire:model="amount_salary"
                                            maxlength="30"
                                            placeholder="{{__("Amount")}}"
                                            class="form-control mb-2"
                                        >
                                        @error('amount_salary') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                @endif
                                <div class="form-group">
                                    {{-- Máximo, Exacto o Inicial --}}
                                    <label>{{ __('Periodicity') }}</label><br/>
                                    <select class="form-select mb-2" wire:model="salary_periodicity">
                                        <option value="hour">{{__('Hour')}}</option>
                                        <option value="day">{{__('Day')}}</option>
                                        <option value="week">{{__('Week')}}</option>
                                        <option value="month">{{__('Month')}}</option>
                                        <option value="year">{{__('Year')}}</option>
                                    </select>
                                    @error('salary_periodicity') <span class="error">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Shift') }}</label>
                                    <select class="form-select mb-2" wire:model="shift">
                                        <option value="">{{ __('Shift') }}</option>
                                        <option value="morning">{{ __('Morning') }}</option>
                                        <option value="evening">{{ __('Evening') }}</option>
                                        <option value="night">{{ __('Night') }}</option>
                                        <option value="mixed">{{ __('Mixed') }}</option>
                                        <option value="varied">{{ __('Varied') }}</option>
                                    </select>
                                    @error('shift') <span class="error">{{ $message }}</span> @enderror
                                </div>

                                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" wire:click="secondStepSubmit">Next</button>
                                <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(1)">{{__('Back')}}</button>
                            </div>
                        </div>
                    </div>


                    {{--  Multi Steps 3  --}}
                    <div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <h3></h3>
                                <div class="form-group">
                                    <label for="title">{{__('Address')}}</label>
                                    <input type="text" wire:model="address"
                                    maxlength="150"
                                    placeholder="{{__("Address")}}"
                                    class="form-control mb-2">
                                    @error('address') <span class="error">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-group">
                                    <label for="title">{{__('Zipcode')}}</label>
                                    <input type="text"
                                    wire:model="zipcode"
                                    wire:change="read_zipcode"
                                    maxlength="5"
                                    placeholder="{{__('Zipcode')}}"
                                    onkeypress="return only_numbers(event, this)"
                                    class="form-control mb-2"
                                    >
                                    @error('zipcode') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                @if($zipcode)
                                    <div class="form-group">
                                        <input type="text"
                                            disabled
                                            class="form-control"
                                            placeholder="{{ $town_state }}"
                                        >
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-4">
                                        {{-- Cantidad de vacantes --}}
                                        <div class="form-group">
                                            <label for="title">{{ __('Quantity Jobs') }}</label>
                                            <input type="number"
                                                wire:model="quantity_jobs"
                                                class="form-control"
                                            >
                                            @error('quantity_jobs') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        {{-- Años de experiencia --}}
                                        <div class="form-group">
                                            <label>{{ __('Years Experience') }}</label>
                                            <input type="number"
                                            wire:model="years_experience"
                                            class="form-control"
                                            >
                                            @error('years_experience') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        {{-- Tiempo para contratar --}}
                                        <div class="form-group">
                                            <label for="title">{{ __('Time To Hire') }}</label>
                                            <select class="form-select" wire:model="times_hire_id">
                                                <option value="">{{ __('Time to Hire') }}</option>
                                                @foreach ($time_hires as $time_to_hire_select)
                                                    <option value="{{ $time_to_hire_select->id }}">
                                                        {{ App::isLocale('en') ? $time_to_hire_select->english :  $time_to_hire_select->spanish }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('times_hire_id') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        {{-- Experiencia Obligatoria --}}
                                        <label>{{ __('Mandatory Experience') }}</label>
                                        <div class="form-group">
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

                                        {{-- Mostrar Dirección   --}}
                                        <label>{{ __('Show Address') }}</label>
                                        <div class="form-group">
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
                                        <label>{{ __('Applicants Send CV') }}</label>
                                        <div class="form-group">
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

                                        {{-- Notificar diariamente   --}}
                                        <label>{{ __('Notify Daily') }}</label>
                                        <div class="form-group">
                                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                <input type="radio"
                                                        wire:model="notify_daily_applications"
                                                        class="btn-check"
                                                        name="notify_daily_applications"
                                                        id="notify_daily_applications_yes"
                                                        value="1">
                                                <label class="btn btn-outline-success" for="notify_daily_applications_yes">{{__('Yes')}}</label>

                                                <input type="radio"
                                                        wire:model="notify_daily_applications"
                                                        class="btn-check"
                                                        name="notify_daily_applications"
                                                        id="notify_daily_applications_no"
                                                        value="0">
                                                <label class="btn btn btn-outline-danger" for="notify_daily_applications_no">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        {{-- Notificar Cada aplicación   --}}
                                        <label>{{ __('Notify Each Application') }}</label>
                                        <div class="form-group">
                                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                <input type="radio"
                                                        wire:model="notify_each_application"
                                                        class="btn-check"
                                                        name="notify_each_application"
                                                        id="notify_each_application_yes"
                                                        value="1">
                                                <label class="btn btn-outline-success" for="notify_each_application_yes">{{__('Yes')}}</label>

                                                <input type="radio"
                                                        wire:model="notify_each_application"
                                                        class="btn-check"
                                                        name="notify_each_application"
                                                        id="notify_each_application_no"
                                                        value="0">
                                                <label class="btn btn btn-outline-danger" for="notify_each_application_no">No</label>
                                            </div>
                                        </div>

                                        {{-- Inglés Obligatorio   --}}
                                        <label>{{ __('Mandatory English') }}</label>
                                        <div class="form-group">
                                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                <input type="radio"
                                                        wire:model="mandatory_english"
                                                        class="btn-check"
                                                        name="mandatory_english"
                                                        id="mandatory_english_yes"
                                                        value="1">
                                                <label class="btn btn-outline-success" for="mandatory_english_yes">{{__('Yes')}}</label>

                                                <input type="radio"
                                                        wire:model="mandatory_english"
                                                        class="btn-check"
                                                        name="mandatory_english"
                                                        id="mandatory_english_no"
                                                        value="0">
                                                <label class="btn btn btn-outline-danger" for="mandatory_english_no">No</label>
                                            </div>
                                        </div>

                                        {{-- Cumple con los requerimientos legales  --}}
                                        <label>{{ __('Cumplies Legal Requirements') }}</label>
                                        <div class="form-group">
                                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                <input type="radio"
                                                        wire:model="complies_legal_requirements"
                                                        class="btn-check"
                                                        name="complies_legal_requirements"
                                                        id="complies_legal_requirements_yes"
                                                        value="1">
                                                <label class="btn btn-outline-success" for="complies_legal_requirements_yes">{{__('Yes')}}</label>

                                                <input type="radio"
                                                        wire:model="complies_legal_requirements"
                                                        class="btn-check"
                                                        name="complies_legal_requirements"
                                                        id="complies_legal_requirements_no"
                                                        value="0">
                                                <label class="btn btn btn-outline-danger" for="complies_legal_requirements_no">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" wire:click="thirdStepSubmit">Next</button>
                            <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(2)">{{__('Back')}}</button>
                        </div>
                    </div>

                    {{--  Multi Steps 4  --}}
                    <div class=" row setup-content {{ $currentStep !=4 ? 'displayNone' : ''}}" id="step-4">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <h3></h3>
                                <div class="form-group">
                                    <label for="title">{{__('Description')}}</label>
                                    <textarea type="textarea"
                                        wire:model="description"
                                        required
                                        placeholder="{{ __('Description') }}";
                                        class="form-control mb-2"
                                        rows="2"
                                        style="resize: none">
                                    </textarea>
                                    @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">{{ __('Benefits') }}</label>
                                    <textarea type="textarea"
                                            wire:model="benefits"
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
                                <div class="form-group">
                                    <label class="form-label">{{ __('Covid Precautions') }}</label>
                                    <textarea type="textarea"
                                        wire:model="covid_precautions"
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
                                {{-- Postead on --}}
                                <div class="form-group">
                                    <label class="form-label">{{ __('Posted On') }}</label>
                                    <input type="date" wire:model="posted_on"
                                    name="posted_on"
                                    class="form-control mb-2">
                                    @error('posted_on') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                {{-- ¿Activo? --}}
                                <div class="form-group">
                                    <label class="form-label">{{ __('Active') }}</label>
                                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                        <input type="radio" wire:model="active" class="btn-check" name="type" id="active" value="1">
                                        <label class="btn btn-outline-success" for="active">{{__('Active')}}</label>

                                        <input type="radio" wire:model="active" class="btn-check ml-4" name="type" id="inactive" value="0">
                                        <label class="btn btn-outline-danger" for="inactive">{{__('Inactive')}}</label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <button class="btn btn-success btn-lg pull-right" wire:click="store" type="button">{{__('Finish!')}}</button>
                            <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(3)">{{__('Back')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if ($name)
        <div class="col-lg-4">
            <div class="card">
                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h3> datos</h3>

                    <table class="table">
                        <tr>
                            <td>{{__('Name')}}:</td>
                            <td><strong>{{$name}}</strong></td>
                        </tr>
                        <tr>
                            <td>{{__('Address')}}:</td>
                            <td><strong>{{$address}}</strong></td>
                        </tr>
                        <tr>
                            <td>{{__('Active')}}:</td>
                            <td><strong>{{$status ? 'Active' : 'DeActive'}}</strong></td>
                        </tr>
                        <tr>
                            <td>{{__('Description')}}:</td>
                            <td><strong>{{$description}}</strong></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    @endif
</div>
