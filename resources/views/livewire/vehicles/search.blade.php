<!-- Search input -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between">
                {{--  Distribuidor  --}}
                <span>
                    <select wire:model="search_dealer_id"
                        class="form-select mr-2 w-auto">
                        <option value="">{{__("Dealer")}}</option>
                        @foreach($dealersList_search as $dealer_search)
                            <option value="{{ $dealer_search->id }}">{{ $dealer_search->name . '(' . $dealer_search->vehicles_count .')' }}</option>
                        @endforeach
                    </select>
                </span>

                {{--  Años  --}}
                <span>
                    <select wire:model="search_model_year"
                        class="form-select mr-2 w-auto">
                        <option value="">{{__("Model Year")}}</option>
                        @foreach($yearsList_search as $year)
                            <option value="{{ $year->model_year }}">{{ $year->model_year . '(' . $year->total .')' }}</option>
                        @endforeach
                    </select>
                </span>

                {{--  Marca  --}}
                <span>
                    <select wire:model="search_make_id"
                        class="form-select mr-2 w-auto">
                        <option value="">{{__("Make")}}</option>vehicles_count
                        @foreach($makesList_search as $make_search)
                            <option value="{{ $make_search->id }}">{{ $make_search->name . '(' . $make_search->vehicles_count .')' }}</option>
                        @endforeach
                    </select>
                </span>

                {{--  Modelo  --}}
                <span>
                    <select wire:model="search_model_id"
                        class="form-select mr-2 w-auto">
                        <option value="">{{__("Model")}}</option>
                        @foreach($modelsList_search as $model_search)
                            <option value="{{ $model_search->id }}">{{ $model_search->name . '(' . $model_search->vehicles_count .')' }}</option>
                        @endforeach
                    </select>
                </span>



                {{--  Estilo  --}}
                <span>
                    <select wire:model="search_style_id"
                        class="form-select mr-2 w-auto">
                        <option value="">{{__("Style")}}</option>
                        @foreach($stylesList_search as $style_search)
                            <option value="{{ $style_search->id }}">{{ $style_search->name . '(' . $style_search->vehicles_count .')' }}</option>
                        @endforeach
                    </select>
                </span>

                {{--  Stock  --}}

                <span>
                    <input type="text"
                    wire:model="stock_search"
                    placeholder="{{ __('Stock')}}"
                    class="form-control w-auto">
                </span>

            </div>
        </div>
    </div>
</div>
