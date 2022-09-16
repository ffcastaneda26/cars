<div class="container">
    <x-jet-validation-errors></x-jet-validation-errors>
    <div class="row align-items-start">
        <div class="col-md-4 flex flex-col">
            <label class="input-group-text mb-2">{{__("Spanish")}}</label>
            <label class="input-group-text mb-2">{{__("Short")}}</label>
            <label class="input-group-text mb-2">{{__("English")}}</label>
            <label class="input-group-text mb-2">{{__("Short")}}</label>
            <label class="input-group-text mb-2">{{__("Color")}}</label>
            <label class="input-group-text mb-2">{{__("Text Color")}}</label>

        </div>

        <div class="col flex flex-col">
            {{-- Español --}}
            <div class="flex-flex-column">
                <input type="text" wire:model="main_record.spanish" required placeholder="{{__("Spanish")}}"
                class="form-control mb-2"
                maxlength="25">
            </div>

            {{-- Corto Español --}}
            <div class="flex-flex-column">
                <input type="text" wire:model="main_record.short_spanish" required placeholder="{{__("Short")}}"
                class="form-control mb-2"
                maxlength="6">
            </div>

            {{-- Inglés --}}
            <div class="flex-flex-column">
                <input type="text" wire:model="main_record.english" required placeholder="{{__("English")}}"
                class="form-control mb-2"
                maxlength="25">
            </div>

            {{-- Corto en Inglés --}}
            <div class="flex-flex-column">
                <input type="text" wire:model="main_record.short_english"
                required placeholder="{{__("Short")}}"
                class="form-control mb-2"
                maxlength="6">
            </div>

            {{-- Color --}}
            <div class="flex flex-column">
                <input type="color"
                        wire:model="main_record.color"
                        class="form-control form-control-color"
                        title="{{__('Choose color')}}"
                >
                @if($main_record->color)
                    <span style="background-color:{{$main_record->color}} ">{{$main_record->color}}</span>
                @endif
            </div>

                {{-- Color del Texto --}}
            <div class="flex-flex-column mb-2">
                <input type="color"
                    wire:model="main_record.text_color"
                    class="form-control form-control-color"
                    title="{{__('Choose color')}}"
                >
                @if($main_record->text_color)
                    <span style="color:{{$main_record->text_color}}">{{$main_record->text_color}}</span>
                @endif
            </div>
        </div>
    </div>
</div>
