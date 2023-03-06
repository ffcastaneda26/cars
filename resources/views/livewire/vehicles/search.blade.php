<!-- Search input -->
<div class="search-bar">
    <div class="cars-container">
        {{--  Años  --}}
        <label class="mr-5"><strong>{{ __('Year') }}</strong></label>
        <span>
            <select wire:model="search_model_year"
                    class="form-select mr-5">
                <option value="">{{__("All")}}</option>
                @foreach($yearsList_search as $year)
                    <option value="{{ $year->model_year }}">{{ $year->model_year . '(' . $year->total .')' }}</option>
                @endforeach
            </select>
        </span>

        {{--  Marca  --}}
        <label class="ml-2 mr-5"><strong>{{ __('Make') }}</strong></label>
        <span>
            <select wire:model="search_make_id"
                    class="form-select mr-5">
                <option value="">{{__("All")}}</option>
                @foreach($makesList_search as $make_search)
                    <option value="{{ $make_search->id }}">{{ $make_search->name . '(' . $make_search->vehicles_count .')' }}</option>
                @endforeach
            </select>
        </span>

        {{--  Modelo  --}}
        <label class="ml-2 mr-5"><strong>{{ __('Model') }}</strong></label>
        <span>
            <select wire:model="search_model_id"
                    class="form-select mr-5">
                <option value="">{{__("All")}}</option>
                @foreach($modelsList_search as $model_search)
                    <option value="{{ $model_search->id }}">{{ $model_search->name . '(' . $model_search->vehicles_count .')' }}</option>
                @endforeach
            </select>
        </span>



        {{--  Estilo  --}}
        <label class="ml-2 mr-5"><strong>{{ __('Style') }}</strong></label>
        <span>
            <select wire:model="search_style_id"
                    class="form-select mr-5">
                <option value="">{{__("All")}}</option>
                @foreach($stylesList_search as $style_search)
                    <option value="{{ $style_search->id }}">{{ $style_search->name . '(' . $style_search->vehicles_count .')' }}</option>
                @endforeach
            </select>
        </span>

        {{--  Stock  --}}

        <label class="ml-2 mr-5"><strong>{{ __('Stock') }}</strong></label>
        <span>
            <input type="text"
            wire:model="stock_search"
            class="form-control w-auto">
        </span>

    </div>
</div>
