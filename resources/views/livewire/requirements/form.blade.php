<div class="container">
    <div class="text-danger">
        <x-jet-validation-errors></x-jet-validation-errors>
    </div>

    {{--  Datos del vehiculo buscado  --}}
    <div class="row align-items-start">

        {{--  Encabezados para lo datos  --}}
        <div class="col-md-3 flex flex-col">
            <label class="input-group-text mb-2">{{__("Name")}}</label>
            <label class="input-group-text mb-2">{{__("Phone")}}</label>
            <label class="input-group-text mb-2">{{__("Year")}}</label>
            <label class="input-group-text mb-2">{{__("Make")}}</label>
            <label class="input-group-text mb-2">{{__("Model")}}</label>
            <label class="input-group-text mb-2">{{__("Max Miles")}}</label>

        </div>

        {{--  Campos del formulario  --}}
        <div class="col flex flex-col align-items-start">

            {{--  Nombre  --}}

            <div class="flex-flex-column">
                <input type="text"
                        wire:model="main_record.name"
                        placeholder="{{ __('Name') }}"
                        {{$record_id ? 'disabled' : ''}}
                        class="form-control mb-2">

            {{-- Teléfono --}}
            <div class="flex-flex-column">
                <input type="text"
                        wire:model="main_record.phone"
                        maxlength="10"
                        pattern="[0-9]"
                        placeholder="{{ __('Phone') }}"
                        {{$record_id ? 'disabled' : ''}}
                        class="form-control mb-2"
                >

            </div>


            {{--  Axo Modelo  --}}
            <div class="flex-flex-column">
                @php
                    $current_month = date("m");
                    if( $current_month >= 8){
                        $axo_actual  =  date("Y") + 1;
                    }else{
                        $axo_actual  =  date("Y");
                    }
                @endphp

                <select wire:model="main_record.model_year"
                            {{$record_id ? 'disabled' : ''}}
                            class="form-select mb-2"
                            >

                    <option value="">{{__("Model Year")}}</option>
                    @for ($axo=$axo_actual ;  $axo>=$axo_actual-13 ; $axo--)
                        <option value="{{ $axo }}" class="normal_option">
                                {{$axo }}
                        </option>

                    @endfor
                </select>

            </div>


            {{--  Marca  --}}
            <select wire:model="main_record.make_id"
                    wire:change="read_make"
                    {{$record_id ? 'disabled' : ''}}
                    class="form-select mb-2">
                <option value="">{{__("Make")}}</option>
                @foreach($makesList as $make_select)
                        <option value="{{ $make_select->id }}" class="normal_option">
                            {{$make_select->name }}
                        </option>
                @endforeach
            </select>

            {{--  Modelo  --}}
            <div class="flex-flex-column">
                <select wire:model="main_record.model_id"
                        class="form-control mb-2"
                        {{$record_id ? 'disabled' : ''}}
                        {{!isset($main_record->make_id) ? 'disabled' : ''}}
                    >
                    <option value="">{{__("Model")}}</option>
                    @if(isset($main_record->make_id) && isset($make->models))
                            @foreach($make->models as $model_select)
                                    <option value="{{ $model_select->id }}"
                                        class="normal_option">
                                        {{$model_select->name }}
                                    </option>
                            @endforeach
                    @endif
                </select>
            </div>

            {{--  Maximo de millas  --}}
            <div class="flex-flex-column col-md-5">
                <input type="text"
                        wire:model="main_record.max_miles"
                        maxlength="10"
                        pattern="[0-9]"
                        placeholder="{{ __('Max Miles') }}"
                        {{$record_id ? 'disabled' : ''}}
                        class="form-control mb-2"
                >

            </div>

        </div>

    </div>

    {{--  Tipo de Financiamiento  --}}
    <div>
        <div class="row align-items-start">
            <div class="d-flex flex flex-row justify-content-start">
                    <div class="d-flex flex-wrap">
                        <label class="input-group-text mb-2 text-wrap">{{__("Do you want financing or cash?")}}</label>
                    </div>

                    <div class="mt-10 btn-group" role="group" aria-label="Basic radio toggle button group">

                        <input type="radio" wire:model="main_record.type_financing" class="btn-check" id="type_financial_financing" value="Financing" {{$record_id ? 'disabled' : ''}} >
                        <label class="btn btn-outline-warning" for="type_financial_financing">{{__('Financing')}}</label>

                        <input type="radio" wire:model="main_record.type_financing" class="btn-check" id="type_financial_cash" value="Cash" {{$record_id ? 'disabled' : ''}}>
                        <label class="ml-2 btn btn-outline-success" for="type_financial_cash">{{__('Cash')}}</label>

                        <input type="radio" wire:model="main_record.type_financing" class="btn-check" id="type_financial_indifferent" value="Indifferent" {{$record_id ? 'disabled' : ''}}>
                        <label class="ml-2 btn btn-outline-info" for="type_financial_indifferent">{{__('Indifferent')}}</label>
                    </div>
            </div>
        </div>


    </div>


    {{--  Dinero para el enganche  --}}
    <div>
        <div class="row align-items-start">
            <div class="d-flex flex flex-row justify-content-start">
                    <div class="d-flex flex-wrap">
                        <label class="input-group-text mb-2">{{__("How much money do you have for the down payment?")}}</label>
                    </div>

                        <input type="text"
                                wire:model="main_record.downpayment"
                                maxlength="10"
                                pattern="[0-9]"
                                placeholder="{{ __('Amount') }}"
                                class="form-control mb-2 ml-2 col-md-3"
                        >

            </div>
        </div>

    </div>

    {{--  Detalles adicionales  --}}
    <div>
        <div>
            <div class="row align-items-start">
                <div class="d-flex flex flex-row justify-content-start">
                        <div class="d-flex flex-wrap">
                            <label class="input-group-text mb-2 text-wrap">
                                {{__("Please let us know more details you want on your vehicle. Example: Leather seats, diesel or gasoline, 4x4, AWD, etc.")}}
                            </label>
                        </div>
                </div>
            </div>

            <div class="row align-items-start">
                <div class="d-flex flex flex-row justify-content-start">
                    <textarea wire:model="main_record.details"
                        class="form-control"
                    p   laceholder="{{_('Details')}}"></textarea>
                </div>
            </div>
        </div>
    </div>
</div>
