<div>
    <div class="cars-container">
        {{--  Años  --}}
        <div class="element">
            <select wire:model="model_year"
                    wire:change="sendFiltersList"
                    class="form-select mr-5">
                <option value="">{{__("Model Year")}}</option>
                @foreach($yearsList as $year)
                    <option value="{{ $year->model_year }}">{{ $year->model_year  }}</option>
                @endforeach
            </select>
        </div>

        {{-- Marcas --}}
        <div class="element">
            <select wire:model="make_id"
                        wire:change="sendFiltersList"
                        class="form-select  mr-5">
                    <option value="">{{__("Make")}}</option>
                    @foreach($makesList as $make_list)
                        <option value="{{ $make_list->id }}">{{ $make_list->name }}
                        </option>
                    @endforeach
            </select>
        </div>


        {{--  Modelos  --}}
        <div class="element">
            <select wire:model="model_id"
                    wire:change="sendFiltersList"
                    class="form-select  mr-5">
                <option>{{__("Model")}}</option>
                @foreach($modelsList as $model)
                    <option value="{{ $model->id }}">{{ $model->name  }}</option>
                @endforeach
            </select>
        </div>

          {{--  Estilos  --}}
        @if(!$style_route)
            <div class="element">
                <select wire:model="style_id"
                        wire:change="sendFiltersList"
                        class="form-select mr-5">
                        <option>{{__("Style")}}</option>
                    @foreach($stylesList as $style)
                        <option value="{{ $style->id }}">{{ $style->name  }}
                        </option>
                    @endforeach
                </select>

            </div>
        @endif
    </div>

</div>
