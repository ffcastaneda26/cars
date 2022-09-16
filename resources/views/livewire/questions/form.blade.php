<div class="container">
    <div class="text-danger">
        <x-jet-validation-errors></x-jet-validation-errors>
    </div>
    <div class="row align-items-start">
        <div class="col-md-3 flex flex-col">
            <label class="input-group-text mb-2">{{__("Spanish")}}</label>
            <label class="input-group-text mb-2">{{__("English")}}</label>
            <label class="input-group-text mb-2">{{__("Type")}}</label>

        </div>

        <div class="col flex flex-col">

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

            {{--Tipo de Pregunta --}}
            <div class="flex-flex-column">
                {{-- Promoción --}}
                <select wire:model="main_record.type_question_id"
                        class="form-select form-select-md  rounded w-auto mb-2"
                >
                    <option>{{ __('Select') }}</option>
                    @foreach ($types_questions as $type_question)
                        <option value="{{ $type_question->id }}">
                            @if (App::isLocale('en'))
                                {{ $type_question->english }}
                            @else
                                {{ $type_question->spanish }}
                            @endif
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>
