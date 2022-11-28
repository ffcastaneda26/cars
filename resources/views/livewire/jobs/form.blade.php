<div class="container">
    <x-jet-validation-errors></x-jet-validation-errors>
    <div class="row align-items-start">
        <div class="col-md-6 flex flex-col">
            <label class="input-group-text mb-2">{{ __('Notify Daily') }}</label>
            <label class="input-group-text mb-2">{{ __('Notify Each Application') }}</label>
            <label class="input-group-text mb-2">{{ __('Mandatory English') }}</label>
            <label class="input-group-text mb-2">{{ __('Cumplies Legal Requirements') }}</label>
            <label class="input-group-text mb-2">{{ __('Address') }}</label>
            <label class="input-group-text mb-2">{{ __('Zipcode') }}</label>

            @if($main_record->zipcode)
                <label class="input-group-text mb-2">{{__("City")}}</label>
            @endif

            <label class="input-group-text mb-2">{{ __('Active') }}</label>
        </div>

        <div class="col flex flex-col">
            <form>


                {{-- Notificar diariamente   --}}
                <div class="flex-flex-column">
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


                {{-- Notificar Cada aplicación   --}}

                <div class="flex-flex-column mt-2">
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

                <div class="flex-flex-column mt-2">
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
                <div class="flex-flex-column mt-2">
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

                {{-- Direccion --}}
                <div class="flex-flex-column mt-2">
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
                        placeholder="{{__('Zipcode')}}"
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
            <div class="col-lg-12">
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
            <div class="col-lg-12">
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
            <div class="col-lg-12">
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
