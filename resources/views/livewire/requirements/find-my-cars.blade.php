<div class="container">


    <div class="m-0 h-100  w-100  justify-content-center align-items-center">

        <div class="col-md-6 p-3 text-center">
            @if(!$message)
                <div class="card justify-content-center" >
                    <div class="card-header">
                        <h3 class="text-center">{{__('Tell us what vehicle you are looking for')}}</h3>
                    </div>

                    {{--  Cuerpo de la tarjeta  --}}
                    <div class="card-body">
                        {{--  Datos del vehiculo buscado  --}}
                        <div class="row align-items-start">
                            {{--  Campos del formulario  --}}
                            <div>

                                {{--  Nombre  --}}
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm"><i class="mdi mdi-account"></i></span>

                                    <input type="text"
                                            wire:model="main_record.name"
                                            placeholder="{{ __('Name') }}"
                                            class="form-control col-md-6"
                                            aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-sm">
                                </div>
                                @error('main_record.name')
                                    <label class="w-auto field_error">{{ $message }}</label>
                                @enderror


                                {{-- Teléfono --}}

                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm"><i class="mdi mdi-cellphone"></i></span>
                                    <input type="text"
                                            wire:model="main_record.phone"
                                            maxlength="10"
                                            pattern="[0-9]"
                                            onkeypress="return only_numbers(event, this)"
                                            placeholder="{{ __('Phone') }}"
                                            class="form-control col-md-6"
                                            aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-sm">

                                </div>
                                @error('main_record.phone')
                                    <label class="w-auto field_error">{{ $message }}</label>
                                @enderror

                                {{--  Axo Modelo  --}}
                                <div class="input-group input-group-sm mb-3">
                                    @php
                                        $current_month = date("m");
                                        if( $current_month >= 8){
                                            $axo_actual  =  date("Y") + 1;
                                        }else{
                                            $axo_actual  =  date("Y");
                                        }
                                    @endphp
                                    <span class="input-group-text" id="inputGroup-sizing-sm"><i class="mdi mdi-calendar"></i></span>

                                    <select wire:model="main_record.model_year"
                                        class="form-select form-control"
                                    >

                                        <option value="">{{__("Model Year")}}</option>
                                        @for ($axo=$axo_actual ;  $axo>=$axo_actual-13 ; $axo--)
                                            <option value="{{ $axo }}" class="normal_option">
                                                    {{$axo }}
                                            </option>

                                        @endfor
                                    </select>
                                </div>

                                @error('main_record.model_year')
                                    <label class="w-auto field_error">{{ $message }}</label>
                                @enderror

                                {{--  Marca  --}}
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm"><i class="mdi mdi-car"></i></span>
                                    <select wire:model="main_record.make_id"
                                            wire:change="read_make"
                                            class="form-select mb-2"
                                        >
                                        <option value="">{{__("Make")}}</option>
                                        @foreach($makesList as $make_select)
                                                <option value="{{ $make_select->id }}" class="normal_option">
                                                    {{$make_select->name }}
                                                </option>
                                        @endforeach
                                    </select>
                                </div>


                                @error('main_record.make_id')
                                    <label class="w-auto field_error">{{ $message }}</label>
                                @enderror

                                {{--  Modelo  --}}
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm"><i class="mdi mdi-alpha-m-circle"></i></span>
                                    {{--  <span class="input-group-text" id="inputGroup-sizing-sm">{{__("Model")}}</span>  --}}
                                    <select wire:model="main_record.model_id"
                                                   class="form-select col-md-7 mb-2">
                                        <option value="">{{__("Model")}}</option>
                                        @if(isset($main_record->make_id) && $make->models->count())
                                            @foreach($make->models as $model_select)
                                                    <option value="{{ $model_select->id }}"
                                                        class="normal_option">
                                                        {{$model_select->name }}
                                                    </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                @error('main_record.model_id')
                                    <label class="w-auto field_error">{{ $message }}</label>
                                @enderror


                                {{--  Maximo de millas  --}}


                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text"><i class="ion ion-md-speedometer"></i></span>
                                    <input type="text"
                                            wire:model="main_record.max_miles"
                                            maxlength="10"
                                            pattern="[0-9]"
                                            onkeypress="return only_numbers(event, this)"
                                            placeholder="{{ __('Max Miles') }}"
                                            class="form-control col-md-3">
                                </div>


                                @error('main_record.max_miles')
                                    <label class="w-auto field_error">{{ $message }}</label>
                                @enderror

                                {{--  Tipo de Financiamiento  --}}
                                <div class="input-group input-group-sm mb-2">
                                    <label class="input-group-text mb-2 text-wrap">{{__("Do you want financing or cash?")}}</label>
                                </div>
                                @error('main_record.type_financing')
                                    <label class="w-auto field_error">{{ $message }}</label>
                                @enderror

                            </div>

                        </div>

                        {{--  Opciones de financiamiento  --}}
                        <div class="find-my-car">
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" wire:model="main_record.type_financing" class="btn-check" id="type_financial_financing" value="Financing">
                                    <label class="btn btn-outline-warning" for="type_financial_financing">{{__('Financing')}}</label>
                                </div>
                                <div>
                                    <input type="radio" wire:model="main_record.type_financing" class="btn-check" id="type_financial_cash" value="Cash">
                                    <label class="ml-2 btn btn-outline-success" for="type_financial_cash">Cash</label>
                                </div>
                                <div>
                                    <input type="radio" wire:model="main_record.type_financing" class="btn-check" id="type_financial_indifferent" value="Indifferent">
                                    <label class="ml-2 btn btn-outline-info" for="type_financial_indifferent">{{__('Indifferent')}}</label>
                                </div>
                        </div>

                       {{--  Dinero para el enganche  --}}

                        <div class="row justify-content-center align-items-center">
                                <div class="input-group input-group-sm mb-2">
                                    <label class="input-group-text mb-2 text-wrap">{{__("How much money do you have for the down payment?")}}</label>
                                </div>
                            </div>

                            @error('main_record.downpayment')
                                <label class="w-auto field_error">{{ $message }}</label>
                            @enderror

                            <div class="d-flex justify-content-center align-items-center">
                                    <input type="text"
                                            wire:model="main_record.downpayment"
                                            maxlength="10"
                                            pattern="[0-9]"
                                            placeholder="Down Payment"
                                            class="form-control mb-2 ml-2 col-md-3"
                                    >
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

                    {{--  Pie de la tarjeta (Boton)  --}}

                    <div class="card-footer">

                            <div class="d-flex justify-content-end">

                                {{--  <div class="visible {{ $allow_save ? '' : 'invisible '}}">  --}}
                                    <span class="mx-2 mt-2">
                                        <button type="button"
                                                wire:click.prevent="store()"
                                                wire:loading.remove wire:target="store"

                                                class="btn btn-success">
                                            {{__("Send") }}
                                        </button>


                                        <button type="button"
                                                wire:click.prevent="store()"
                                                wire:loading wire:target="store"
                                                disabled
                                                class="btn btn-warning">
                                                {{__("Sending") }}
                                        </button>
                                    </span>
                                {{--  </div>  --}}

                            </div>

                    </div>
                </div>

            @else
                <h1 class="text-capitalize text-center">{{ $message}}</h1>
            @endif
        </div>
    </div>


</div>
