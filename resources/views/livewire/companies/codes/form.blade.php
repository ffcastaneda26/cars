<div class="container">
    <div class="text-danger">
        <x-jet-validation-errors></x-jet-validation-errors>
    </div>
    <div class="row align-items-start">
        <div class="col-md-4 flex flex-col">
            <label class="input-group-text mb-2">{{__("Company")}}</label>
            <label class="input-group-text mb-2">{{__("Total Codes")}}</label>
            <label class="input-group-text mt-2">{{ __('Printed?') }}</label>
        </div>

        <div class="col flex flex-col">

            <div class="flex-flex-column mb-2">

                {{-- Empresa --}}

                <div class="flex-flex-column mb-2">

                    <select  wire:model="main_record.company_id"
                            class="form-select"
                            @if($main_record->codes->count()) disabled @endif
                        >
                        <option value="">{{ __('Company') }}</option>
                        @foreach ($companies as $company)
                            <option
                                class="block mt-0 text-sm leading-tight font-semibold text-gray-900 hover:underline"
                                value="{{ $company->id }}">{{ $company->name }}
                            </option>
                        @endforeach
                    </select>
                </div>


                {{-- Total de Códigos a Generar --}}
                <div class="flex-flex-column mb-2">
                        @if($main_record->codes->count())
                            <label class="mb-2">{{$main_record->total_codes}}</label>
                        @else
                            <input type="number"
                                    wire:model="main_record.total_codes"
                                    min="1"
                                    max="9999"
                                    required
                            >

                        @endif

                </div>

            {{-- Impreso? --}}

                <div class="flex-flex-column mt-2">
                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                            <input type="radio" wire:model="printed" class="btn-check" name="type" id="printed" value="1" @if($main_record->printed) disabled @endif>
                            <label class="btn btn-outline-danger" for="printed">{{__('Yes')}}</label>
                            <input type="radio" wire:model="printed" class="btn-check ml-4" name="type" id="no_printed" value="0" @if($main_record->printed) disabled @endif>
                            <label class="btn btn-outline-success" for="no_printed">{{__('No')}}</label>
                        </div>
                </div>

            </div>

        </div>
    </div>

</div>
