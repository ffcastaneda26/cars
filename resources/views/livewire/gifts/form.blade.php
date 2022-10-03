<div class="container">
    <div class="text-danger">
        <x-jet-validation-errors></x-jet-validation-errors>
    </div>
    <div class="row align-items-start">
        <div class="col-md-3 flex flex-col">
            <label class="input-group-text mb-2">{{__("Promotion")}}</label>
            <label class="input-group-text mb-2">{{__("Spanish")}}</label>
            <label class="input-group-text mb-2">{{__("English")}}</label>
            <label class="input-group-text mb-2">{{__("Active?")}}</label>

        </div>

        <div class="col flex flex-col">
            {{-- Promoción --}}
            <select wire:model="main_record.promotion_id"
                    class="form-select form-select-md  rounded w-auto mb-2"
            >
                <option>{{ __('Select') }}</option>
                @foreach ($promotions as $promotion)
                    <option value="{{ $promotion->id }}">
                        @if (App::isLocale('en'))
                            {{ $promotion->english }}
                        @else
                            {{ $promotion->spanish }}
                        @endif
                    </option>
                @endforeach
            </select>

            {{-- Español --}}
            <div class="flex-flex-column">
                <input type="text" wire:model="main_record.spanish" required placeholder="{{__("Spanish")}}"
                class="form-control mb-2"
                maxlength="25">
            </div>


            {{-- Inglés --}}
            <div class="flex-flex-column">
                <input type="text" wire:model="main_record.english" required placeholder="{{__("English")}}"
                class="form-control mb-2"
                maxlength="25">
            </div>

            {{-- ¿Activo? --}}
            <div class="flex-flex-column">
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" wire:model="active" class="btn-check" name="type" id="active" value="1">
                    <label class="btn btn-outline-success" for="active">{{__('Active')}}</label>

                    <input type="radio" wire:model="active" class="btn-check" name="type" id="inactive" value="0">
                    <label class="btn btn-outline-danger" for="inactive">{{__('Inactive')}}</label>

                </div>
            </div>

        </div>
    </div>

    <div class="row align-items-start">
        {{-- Leyenda Legal --}}
        <div class="input-group mb-3 grid-cols-2 gap-2">
            <span class="input-group-text">{{__("Legal Legend")}}</span>
            <div class="flex flex-column">
                <textarea wire:model="main_record.legal_legend" class="form-control" rows="2" cols="50"></textarea>
            </div>
        </div>
    </div>
</div>
