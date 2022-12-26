<div>
    <div class="container">
         <div class="text-center"><h4>{{ __('Select Filter') }}</h4></div>

         <div class="row text-center">

            {{-- Años --}}
            <div class="flex flex-col mb-2">
                <label class="input-group-text mb-2">{{ __('Year') }}</label>
                <select wire:model="model_year"
                        wire:change="sendFiltersList('model_year',$event.target.value)"
                        class="form-select">
                    <option value="">{{__("All")}}</option>
                    @foreach($yearsList as $year)
                        <option value="{{ $year->model_year }}">{{ $year->model_year . '(' . $year->total .')' }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Marcas --}}

            <div class="flex flex-col mb-2">
                <label class="input-group-text mb-2">{{ __('Make') }}</label>
                <select wire:model="make"
                           wire:change="sendFiltersList('make',$event.target.value)"class="form-select">
                           <option value="">{{__("All")}}</option>

                         @foreach($makesList as $make_list)
                            <option value="{{ $make_list->make }}">{{ $make_list->make . '(' . $make_list->total .')' }}</option>
                        @endforeach


                </select>
            </div>

            {{-- Modelos --}}

            <div class="flex flex-col mb-2">
                <label class="input-group-text mb-2">{{ __('Model') }}</label>
                <select wire:model="model"
                        wire:change="sendFiltersList('model',$event.target.value)"class="form-select">
                    <option value="">{{__("All")}}</option>
                    @foreach($modelsList as $model)
                        <option value="{{ $model->model }}">{{ $model->model . '(' . $model->total .')' }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Estilos --}}

            <div class="flex flex-col mb-2">
                <label class="input-group-text mb-2">{{ __('Body') }}</label>
                <select wire:model="body"
                        wire:change="sendFiltersList('body',$event.target.value)"class="form-select">
                    <option value="">{{__("All")}}</option>
                    @foreach($bodiesList as $body)
                        <option value="{{ $body->body }}">{{ $body->body . '(' . $body->total .')' }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Colores --}}

            <div class="flex flex-col mb-2">
                <label class="input-group-text mb-2">{{ __('Color') }}</label>
                <select wire:model="color_id"
                        wire:change="sendFiltersList('color_id',$event.target.value)"class="form-select">
                        <option value="">{{__("All")}}</option>
                        @foreach($colors as $color)
                            <option value="{{ $color->id }}">
                                {{  $color->color  . '(' . $color->total_vehicles_exterior() .')'}}
                            </option>
                        @endforeach
                </select>

            </div>


            {{-- Rango de Millas --}}
              <div class="flex flex-col">
                    <label class="input-group-text mb-2">{{ __('Miles') }}</label>
                    <div class="d-flex justify-content-between">
                        <label >{{ __('From') }}</label>
                        @if(env('APP_TYPE_MILES_SHOW_SELECT',false))
                            <select wire:model="miles_from"
                                    wire:change="sendFiltersList('miles_from',$event.target.value)">
                                    <option value="">{{__("All")}}</option>
                                    @for($i=$miles_min;$i<$miles_max;$i=$i+$miles_step)
                                        <option value="{{ $i}}">
                                            {{  $i }}
                                        </option>
                                    @endfor

                            </select>
                        @else
                            <input type="number"
                                wire:model="miles_from"
                                wire:change="sendFiltersList('miles_from',$event.target.value)"
                                min="{{ $miles_min }}"
                                max={{ $miles_max }}
                                step="{{ $miles_step }}">
                        @endif

                    </div>

                    <div class="d-flex justify-content-between mt-2">
                        <label >{{ __('To') }}</label>

                        @if(env('APP_TYPE_MILES_SHOW_SELECT',false))
                            <select wire:model="miles_to"
                                    wire:change="sendFiltersList('miles_to',$event.target.value)">
                                    <option value="">{{__("All")}}</option>
                                    @for($i=$miles_min;$i<$miles_max+$miles_step;$i=$i+$miles_step)
                                        <option value="{{ $i}}">
                                            {{  $i }}
                                        </option>
                                    @endfor

                            </select>
                        @else
                            <input type="number"
                                wire:model="miles_to"
                                wire:change="sendFiltersList('miles_to',$event.target.value)"
                                min="{{ $miles_min }}"
                                max={{ $miles_max }}
                                step="{{ $miles_step }}">
                        @endif
                    </div>

              </div>


         </div>
    </div>
 </div>
