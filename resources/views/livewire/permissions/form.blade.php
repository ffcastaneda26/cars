
<div class="container">

        <x-jet-validation-errors></x-jet-validation-errors>


    <div class="row align-items-start">
      <div class="col-md-4 flex flex-col">
        <label class="input-group-text mb-2">{{__("Name")}}</label>
        <label class="input-group-text mb-2">{{__("Slug")}}</label>
        <label class="input-group-text mb-2">{{__("English")}}</label>
        <label class="input-group-text mb-2">{{__("Spanish")}}</label>
      </div>


        <div class="col flex flex-col">

        {{-- Nombre --}}
            <div class="flex-flex-column">
                <input type="text"
                        wire:model="main_record.name"
                        required
                        placeholder="{{__('Permission')}}"
                        class="form-control mb-2"
                        maxlength="100"
                >
            </div>

            {{-- Nombre --}}
            <div class="flex-flex-column">
                <input type="text"
                        wire:model="main_record.slug"
                        required
                        placeholder="{{__('Slug')}}"
                        class="form-control mb-2"
                        maxlength="100"
                >
            </div>

        {{-- English --}}
            <div class="flex-flex-column">
                <input type="text" wire:model="main_record.english" required placeholder="{{__("English")}}"
                    class="form-control mb-2">
                </div>

            {{-- Español --}}
            <div class="flex-flex-column">
                <input type="text" wire:model="main_record.spanish" required placeholder="{{__("Spanish")}}"
                class="form-control mb-2">
            </div>
        </div>

    </div>
</div>
