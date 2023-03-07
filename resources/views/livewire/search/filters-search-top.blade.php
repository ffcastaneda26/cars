<div>
    <div class="cars-container">
        {{--  Años  --}}
        <div class="element">
            <select wire:model="model_year"
                    wire:change="sendFiltersList"
                    class="form-select mr-5">
                <option value="{{null}}">{{__("Model Year")}}</option>
                @foreach($yearsList as $year)
                    <option value="{{ $year->model_year }}">{{ $year->model_year . '(' . $year->total .')' }}</option>
                @endforeach
            </select>
        </div>

        {{-- Marcas --}}
        <div class="element">
            <select wire:model="make_id"
                        wire:change="sendFiltersList"
                        class="form-select  mr-5">
                    <option value="{{null}}">{{__("Make")}}</option>
                    @foreach($makesList as $make_list)
                        <option value="{{ $make_list->id }}">{{ $make_list->name }}
                            ({{$make_list->vehicles_count }})
                        </option>
                    @endforeach
            </select>
        </div>


        {{--  Modelos  --}}
        <div class="element">
            <select wire:model="model_id"
                    wire:change="sendFiltersList"
                    class="form-select  mr-5">
                <option value="{{null}}">{{__("Model")}}</option>
                @foreach($modelsList as $model)
                    <option value="{{ $model->id }}">{{ $model->name  }}
                        ({{$model->vehicles_count }})
                    </option>
                @endforeach
            </select>
        </div>

        {{--  TODO: Si en la ruta se pone estilo no mostrar esta parte  --}}
        {{--  Estilos  --}}
        @if(!$style_route)
            <div class="element">
                <select wire:model="style_id"
                        wire:change="sendFiltersList"
                        class="form-select  mr-5">
                    <option value="">{{__("Style")}}</option>
                    @foreach($stylesList as $style)
                        <option value="{{ $style->id }}">{{ $style->name  }}
                            ({{$style->vehicles_count }})
                        </option>
                    @endforeach
                </select>

            </div>
        @endif
    </div>

</div>
