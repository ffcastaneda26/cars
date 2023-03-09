<div>
    <div class="container">
        <div class="m-0 h-100  w-100 row justify-content-center align-items-center">
            @if(!$message)
                <div class="col-md-7 p-5 text-center">
                    <div class="card justify-content-center" >
                        <div class="card-header">
                            <h3 class="text-capitalize text-center">{{__('Tell us what vehicle you are looking for')}}</h3>
                            <h5 class="text-center">{{__('Fill in all the information to continue')}}</h5>
                        </div>

                        {{--  Cuerpo de la tarjeta  --}}
                        <div class="card-body">

                            {{--  Datos del vehiculo buscado  --}}
                            <div class="row align-items-start">

                                {{--  Encabezados para lo datos  --}}
                                <div class="col-md-3 flex flex-col">
                                    <label class="input-group-text mb-2">{{__("Name")}}</label>
                                    @error('main_record.name')<label class="mb-2"></label></label>@enderror
                                    <label class="input-group-text mb-2">{{__("Phone")}}</label>
                                    @error('main_record.phone')<label class="mb-2"></label></label>@enderror
                                    <label class="input-group-text mb-2">{{__("Year")}}</label>
                                    @error('main_record.model_year')<label class="mb-2"></label></label>@enderror

                                    <label class="input-group-text mb-2">{{__("Make")}}</label>
                                    @error('main_record.make_id')<label class="mb-2"></label></label>@enderror

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
                                                class="form-control mb-2"
                                        >
                                        @error('main_record.name')<span class="bg-danger">{{ $message }}</span>@enderror
                                    </div>

                                    {{-- Teléfono --}}
                                    <div class="flex-flex-column">
                                        <input type="text"
                                                wire:model="main_record.phone"
                                                maxlength="10"
                                                pattern="[0-9]"
                                                placeholder="{{ __('Phone') }}"
                                                class="form-control mb-2"
                                        >
                                        @error('main_record.phone')<span class="bg-danger">{{ $message }}</span>@enderror

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
                                                    class="form-select mb-2">

                                            <option value="">{{__("Model Year")}}</option>
                                            @for ($axo=$axo_actual ;  $axo>=$axo_actual-13 ; $axo--)
                                                <option value="{{ $axo }}" class="normal_option">
                                                        {{$axo }}
                                                </option>

                                            @endfor
                                        </select>
                                        @error('main_record.model_year')<span class="bg-danger">{{ $message }}</span>@enderror

                                    </div>


                                    {{--  Marca  --}}
                                    <select wire:model="main_record.make_id"
                                            wire:change="read_make"
                                            class="form-select mb-2
                                            {{ $errors->has('main_record.make_id') ? 'field_error' : '' }}"
                                        >
                                        <option value="">{{__("Make")}}</option>
                                        @foreach($makesList as $make_select)
                                                <option value="{{ $make_select->id }}" class="normal_option">
                                                    {{$make_select->name }}
                                                </option>
                                        @endforeach
                                    </select>


                                    @error('main_record.make_id')<span class="bg-danger">{{ $message }}</span>@enderror


                                    {{--  Modelo  --}}
                                    <div class="flex-flex-column">
                                        <select wire:model="main_record.model_id"
                                                class="form-control mb-2
                                                {{ $errors->has('main_record.model_id') ? 'field_error' : '' }}"
                                                @if(!isset($main_record->make_id) )
                                                    @disabled(true)
                                                @endif
                                            >
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

                                    {{--  Maximo de millas  --}}
                                    <div class="flex-flex-column col-md-5">
                                        <input type="text"
                                                wire:model="main_record.max_miles"
                                                maxlength="10"
                                                pattern="[0-9]"
                                                placeholder="{{ __('Max Miles') }}"
                                                class="form-control mb-2"
                                        >

                                    </div>
                                    @error('main_record.max_miles')<span class="bg-danger">{{ $message }}</span>@enderror

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
                                                <input type="radio" wire:model="main_record.type_financing" class="btn-check" id="type_financial_financing" value="Financing">
                                                <label class="btn btn-outline-warning" for="type_financial_financing">{{__('Financing')}}</label>

                                                <input type="radio" wire:model="main_record.type_financing" class="btn-check" id="type_financial_cash" value="Cash">
                                                <label class="ml-2 btn btn-outline-success" for="type_financial_cash">{{__('Cash')}}</label>

                                                <input type="radio" wire:model="main_record.type_financing" class="btn-check" id="type_financial_indifferent" value="Indifferent">
                                                <label class="ml-2 btn btn-outline-info" for="type_financial_indifferent">{{__('Indifferent')}}</label>
                                            </div>
                                    </div>
                                </div>


                                @error('main_record.type_financing')
                                    <div class="row align-items-between">
                                        <span class="bg-danger">{{ $message }}</span>
                                    </div>
                                @enderror
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

                                @error('main_record.downpayment')
                                    <div class="row align-items-between">
                                        <span class="bg-danger">{{ $message }}</span>
                                    </div>
                                @enderror
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

                                    <div class="visible {{ $allow_save ? '' : 'invisible '}}">
                                        <span class="mx-2">
                                            <button type="button"
                                                    wire:click.prevent="store()"
                                                    wire:loading.remove wire:target="store"
                                                    {{ $allow_save ? '' : 'disabled'}}

                                                    class="btn btn-success">
                                                {{__("Save") }}
                                            </button>


                                            <button type="button"
                                                    wire:click.prevent="store()"
                                                    wire:loading wire:target="store"
                                                    disabled
                                                    class="btn btn-warning">
                                                    {{__("Saving") }}
                                            </button>
                                        </span>
                                    </div>

                                </div>

                        </div>
                    </div>
                </div>
            @else
                <h1 class="text-capitalize text-center">{{ $message}}</h1>
            @endif

        </div>





        </div>
    </div>
</div>
