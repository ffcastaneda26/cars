<div class="container">
    <x-jet-validation-errors></x-jet-validation-errors>
    <div class="row align-items-start">
        <div class="w-auto flex flex-col">
            <label class="input-group-text mb-2">{{ __('Name') }}</label>
            <label class="input-group-text mb-2">{{ __('Enlgish') }}</label>
            <label class="input-group-text mb-2">{{ __('Spanish') }}</label>
            <label class="input-group-text mb-2">{{ __('Full Access') }}</label>
        </div>

            <div class="col flex flex-col">
                <form>
                    {{-- Nombre --}}
                    <div class="flex-flex-column">
                        <input type="text"
                            wire:model="main_record.name"
                            maxlength="100"
                            placeholder="{{__("Name")}}"
                            class="form-control mb-2"
                        >
                    </div>


                    {{-- Inglés --}}
                    <div class="flex-flex-column">
                        <input type="text"
                            wire:model="main_record.english"
                            maxlength="100"
                               placeholder="{{__("English")}}"
                            class="form-control mb-2"
                        >
                    </div>

                    {{-- Español --}}
                    <div class="flex-flex-column">
                        <input type="text"
                            wire:model="main_record.spanish"
                            maxlength="100"
                               placeholder="{{__("Spanish")}}"
                            class="form-control mb-2"
                        >
                    </div>

                    <div class="flex-flex-column mt-2">
                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                            <input type="radio" wire:model="full_access" class="btn-check" name="type" id="full_access_yes" value="1">
                            <label class="btn btn-outline-success" for="full_access_yes">{{__('Yes')}}</label>

                            <input type="radio" wire:model="full_access" class="btn-check ml-4" name="type" id="full_access_no" value="0">
                            <label class="btn btn-outline-danger" for="full_access_no">{{__('No')}}</label>
                        </div>
                    </div>
                </form>
            </div>

    </div>
</div>
