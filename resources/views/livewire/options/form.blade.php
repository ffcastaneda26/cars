<div class="container">
    <div class="text-danger">
        <x-jet-validation-errors></x-jet-validation-errors>
    </div>
    <div class="row align-items-start">
        <div class="col-md-3 flex flex-col">
            <label class="input-group-text mb-2">{{__("Question")}}</label>
            <label class="input-group-text mb-2">{{__("Spanish")}}</label>
            <label class="input-group-text mb-2">{{__("English")}}</label>

        </div>

        <div class="col flex flex-col">
        {{-- Pregunta --}}
            <select wire:model="main_record.question_id"
                    class="form-select form-select-md  rounded w-auto mb-2"
            >
                <option>{{ __('Select') }}</option>
                @foreach ($questions as $question)
                    <option value="{{ $question->id }}">
                        @if (App::isLocale('en'))
                            {{ $question->english }}
                        @else
                            {{ $question->spanish }}
                        @endif
                    </option>
                @endforeach
            </select>

        {{-- Español --}}
            <div class="flex-flex-column">
                <input type="text" wire:model="main_record.spanish" required placeholder="{{__("Spanish")}}"
                class="form-control mb-2"
                maxlength="100">
            </div>


        {{-- Inglés --}}
            <div class="flex-flex-column">
                <input type="text" wire:model="main_record.english" required placeholder="{{__("English")}}"
                class="form-control mb-2"
                maxlength="100">
            </div>

        </div>
    </div>
</div>
