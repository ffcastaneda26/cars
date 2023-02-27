<div class="container">
    <x-jet-validation-errors></x-jet-validation-errors>
    <div class="row align-items-start">
      <div class="col-md-3 flex flex-col">
        <label class="input-group-text mb-2">{{__("Spanish")}}</label>
        <label class="input-group-text mb-2">{{__("English")}}</label>
        <label class="input-group-text mb-2">{{__("Code")}}</label>

      </div>


        <div class="col flex flex-col">
            {{-- Español --}}
            <div class="flex-flex-column">
                <input type="text" wire:model="main_record.spanish" required placeholder="{{__("Spanish")}}"
                class="form-control mb-2"
                maxlength="20">
            </div>

            {{-- Inglés --}}
            <div class="flex-flex-column">
                <input type="text" wire:model="main_record.english" required placeholder="{{__("English")}}"
                class="form-control mb-2"
                maxlength="20">
            </div>

            {{-- Código --}}
            <div class="flex-flex-column col-md-2">
                <input type="text" wire:model="main_record.code" required placeholder="{{__("Code")}}"
                class="col-md-2 form-control mb-2"
                maxlength="2">
            </div>

        </div>

    </div>


    {{-- Imagen --}}
    <div class="row align-items-center ml-5">
        <label class="text-center">{{ __('Image') }}</label>
    </div>
    <div class="row align-items-between ml-5">
        <input type="file" wire:model="image_path">
    </div>

</div>

