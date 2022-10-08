<div class="container">
    <div class="text-danger">
        <x-jet-validation-errors></x-jet-validation-errors>
    </div>
    <div class="row align-items-start">
        <div class="col-md-4 flex flex-col">
            <label class="input-group-text mb-2">{{__("From")}}</label>
            <label class="input-group-text mb-2">{{__("To")}}</label>
            <label class="input-group-text mt-2">{{ __('Active?') }}</label>
        </div>

        <div class="col flex flex-col">
            {{-- Desde --}}
            <div class="flex-flex-column">
                <input type="date"
                        wire:model="main_record.from"
                        required
                        placeholder="{{__("From")}}"
                        class="form-control mb-2"

                >
            </div>
            {{-- Desde --}}
            <div class="flex-flex-column">
                <input type="date"
                        wire:model="main_record.to"
                        required
                        placeholder="{{__("To")}}"
                        class="form-control mb-2"
                >
            </div>

            {{-- ¿Activo? --}}

            <div class="flex-flex-column">
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" wire:model="active" class="btn-check" name="type" id="active" value="1">
                    <label class="btn btn-outline-success" for="active">{{__('Active')}}</label>

                    <input type="radio" wire:model="active" class="btn-check ml-4" name="type" id="inactive" value="0">
                    <label class="btn btn-outline-danger" for="inactive">{{__('Inactive')}}</label>
                </div>
            </div>



        </div>
    </div>

</div>
