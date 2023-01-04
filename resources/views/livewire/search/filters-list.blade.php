<div>
    <div class="container mt-3">
   

         <div class="row text-center">

            {{-- Años --}}
            <div class="flex flex-col mb-2 text-left">
                <label class="mb-2"><strong>{{ __('Year') }}</strong></label>
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

            <div class="flex flex-col mb-2 text-left">
                <label class="mb-2"><strong>{{ __('Make') }}</strong></label>
                <select wire:model="make"
                           wire:change="sendFiltersList('make',$event.target.value)"class="form-select">
                           <option value="">{{__("All")}}</option>

                         @foreach($makesList as $make_list)
                            <option value="{{ $make_list->make }}">{{ $make_list->make . '(' . $make_list->total .')' }}</option>
                        @endforeach


                </select>
            </div>

            {{-- Modelos --}}

            <div class="flex flex-col mb-2 text-left">
                <label class="mb-2"><strong>{{ __('Model') }}</strong></label>
                <select wire:model="model"
                        wire:change="sendFiltersList('model',$event.target.value)"class="form-select">
                    <option value="">{{__("All")}}</option>
                    @foreach($modelsList as $model)
                        <option value="{{ $model->model }}">{{ $model->model . '(' . $model->total .')' }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Estilos --}}

            <div class="flex flex-col mb-2 text-left">
    
                <label class="mb-2"><strong>{{ __('Body') }}</strong></label>
                <select wire:model="body"
                        wire:change="sendFiltersList('body',$event.target.value)"class="form-select">
                    <option value="">{{__("All")}}</option>
                    @foreach($bodiesList as $body)
                        <option value="{{ $body->body }}">{{ $body->body . '(' . $body->total .')' }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Colores --}}

            <div class="flex flex-col mb-2 text-left">
                <label class="mb-2"><strong>{{ __('Color') }}</strong></label>
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

            {{-- Máximo de Millas --}}
            <div class="flex flex-col mb-2 text-left">
                <label class="mb-2"><strong>{{ __('Max Miles') }}</strong></label>
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
                        max={{ $miles_max + $miles_step }}
                        step="{{ $miles_step }}">
                @endif

            </div>





         </div>
    </div>
 </div>
