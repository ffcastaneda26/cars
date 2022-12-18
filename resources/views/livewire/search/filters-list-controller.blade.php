<div>
    <div class="container">
         <div class="text-center"><h4>{{ __('Select Filter') }}</h4></div>

         <div class="row text-center">

            {{-- Marcas --}}

            <div class="flex flex-col">
                <label class="input-group-text mb-2">{{ __('Make') }}</label>
                <select wire:change="sendFiltersList('make',$event.target.value)"class="form-select">
                        <option value="null">{{__("Make")}}</option>
                        @foreach($makesList as $make)
                            <option value="{{ $make->make }}">{{ $make->make . '(' . $make->total .')' }}</option>
                        @endforeach
                </select>
            </div>

            {{-- Modelos --}}

            <div class="flex flex-col mb-2">
                <label class="input-group-text mb-2">{{ __('Model') }}</label>
                <select wire:change="sendFiltersList('model',$event.target.value)"class="form-select">
                    <option value="null">{{__("Model")}}</option>
                    @foreach($modelsList as $model)
                        <option value="{{ $model->model }}">{{ $model->model . '(' . $model->total .')' }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Estilos --}}

            <div class="flex flex-col">
                <label class="input-group-text mb-2">{{ __('Body') }}</label>
                <select wire:change="sendFiltersList('body',$event.target.value)"class="form-select">
                    <option value="null">{{__("Body")}}</option>
                    @foreach($bodiesList as $body)
                        <option value="{{ $body->body }}">{{ $body->body . '(' . $body->total .')' }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Colores --}}

            <div class="flex flex-col">
                <label class="input-group-text mb-2">{{ __('Color') }}</label>
                <select wire:change="sendFiltersList('color_id',$event.target.value)"class="form-select">
                        <option value="">{{__("Color")}}</option>
                        @foreach($colors as $color)
                            <option value="{{ $color->id }}">
                                {{  $color->color  . '(' . $color->total_vehicles_exterior() .')'}}
                            </option>
                        @endforeach
                </select>

            </div>

            {{-- Años --}}
            <div class="flex flex-col">
                <label class="input-group-text mb-2">{{ __('Year') }}</label>
                <select wire:change="sendFiltersList('body',$event.target.value)"class="form-select">
                    <option value="null">{{__("Year")}}</option>
                    @foreach($yearsList as $year)
                        <option value="{{ $year->model_year }}">{{ $year->model_year . '(' . $year->total .')' }}</option>
                    @endforeach
                </select>
            </div>

         </div>
    </div>
 </div>
