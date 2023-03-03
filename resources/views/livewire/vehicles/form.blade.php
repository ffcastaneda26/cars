
<style>
    .caja_grande {
        min-height: 480px;
    }
    .field_error {
        background-color: red;
        color: yellow;
      }

    .error_box {
        background-color: white;
        color: red;
        font-family: 'Times New Roman', Times, serif;
        font: bold;
    }

    .normal_option{
        background-color: white;
        color: black;
    }

</style>
<div class="container">
    <div class="text-danger">
        <x-jet-validation-errors></x-jet-validation-errors>
    </div>
    <div class="row align-items-start">
        <div class="col-md-4 flex flex-col">
            <label class="input-group-text mb-2">{{__("Dealer")}}</label>
            <label class="input-group-text mb-2">{{__("Year")}}</label>
            <label class="input-group-text mb-2">{{__("Make")}}</label>
            <label class="input-group-text mb-2">{{__("Model")}}</label>
            <label class="input-group-text mb-2">{{__("Style")}}</label>
            <label class="input-group-text mb-2">{{__("Description")}}</label>
        </div>

        <div class="col flex flex-col">



            {{--  Distribuidor  --}}

            <select wire:model="main_record.dealer_id"
                    class="form-control mb-2
                    {{ $errors->has('main_record.dealer_id') ? 'field_error' : '' }}"
                >
                <option value="">{{__("Dealer")}}</option>
                @foreach($dealersList as $dealer_select)
                        <option value="{{ $dealer_select->id }}" class="normal_option">
                            {{$dealer_select->name }}
                        </option>
                @endforeach
            </select>


            {{--  Axo Modelo  --}}
            @php
                $axo_actual  =  date("Y");
            @endphp
            <input type="number"
                wire:model="main_record.model_year"
                class="form-control col-md-4 mb-2"
                min="{{$axo_actual-20}}"
                max="{{$axo_actual+1}}"
            >


            {{--  Marca  --}}
            <select wire:model="main_record.make_id"
                    wire:change="read_models"
                    class="form-control mb-2
                    {{ $errors->has('main_record.make_id') ? 'field_error' : '' }}"
                >
                <option value="">{{__("Make")}}</option>
                @foreach($makesList as $make_select)
                        <option value="{{ $make_select->id }}" class="normal_option">
                            {{$make_select->name }}
                        </option>
                @endforeach
            </select>

            {{--  Modelo  --}}
            <select wire:model="main_record.model_id"
                    class="form-control mb-2
                    {{ $errors->has('main_record.model_id') ? 'field_error' : '' }}"
                >
                <option value="">{{__("Model")}}</option>
                @if($modelsList && $modelsList->count())
                        @foreach($modelsList as $model_select)
                                <option value="{{ $model_select->id }}"
                                    class="normal_option">
                                    {{$model_select->name }}
                                </option>
                        @endforeach
                @endif
            </select>

            {{--  Estilo  --}}
            <select wire:model="main_record.style_id"
                    class="form-control mb-2
                    {{ $errors->has('main_record.syle_id') ? 'field_error' : '' }}"
                >
                <option value="">{{__("Style")}}</option>
                @if($stylesList && $stylesList->count())
                        @foreach($stylesList as $style_select)
                                <option value="{{ $style_select->id }}" class="normal_option">
                                    {{$style_select->name }}
                                </option>
                        @endforeach
                @endif
            </select>

            {{--  Descripcion  --}}
            <div class="flex-flex-column mb-2">
                <textarea wire:model="main_record.description"
                        class="form-control"

                        placeholder="{{_('Description')}}"></textarea>
            </div>

            {{--  Disponible  --}}

            {{--  <div class="flex-flex-column mb-2">
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" wire:model="available" class="btn-check" id="available_yes" value="1">
                    <label class="btn btn-outline-success" for="available_yes">{{__('Yes')}}</label>

                    <input type="radio" wire:model="available" class="btn-check ml-4" id="available_no" value="0">
                    <label class="btn btn-outline-danger" for="available_no">{{__('No')}}</label>
                </div>
            </div>  --}}

            {{--  Mostrar  --}}
            {{--  <div class="flex-flex-column mb-2">
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" wire:model="show" class="btn-check" id="show_yes" value="1">
                    <label class="btn btn-outline-success" for="show_yes">{{__('Yes')}}</label>

                    <input type="radio" wire:model="show" class="btn-check ml-4" id="show_no" value="0">
                    <label class="btn btn-outline-danger" for="show_no">{{__('No')}}</label>
                </div>
            </div>  --}}


        </div>

    </div>
</div>

