<div>
    <div class="container mt-3">

         <div class="row text-center">

            {{-- Años --}}
            <div class="flex flex-col mb-2 text-left">
                <label class="mb-2"><strong>{{ __('Year') }}</strong></label>
                <select wire:model="model_year"
                        wire:change="fill_combos_fields"
                        class="form-select">
                    <option value="{{null}}">{{__("All")}}</option>
                    @foreach($yearsList as $year)
                        <option value="{{ $year->model_year }}">{{ $year->model_year . '(' . $year->total .')' }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Marcas --}}

            <div class="flex flex-col mb-2 text-left">
                <label class="mb-2"><strong>{{ __('Make') }}</strong></label>
                <select wire:model="make_id"
                           wire:change="fill_combos_fields"
                           class="form-select">
                        <option value="{{null}}">{{__("All")}}</option>
                         @foreach($makesList as $make_list)
                            <option value="{{ $make_list->id }}">{{ $make_list->name }}
                                ({{$make_list->vehicles_count }})
                            </option>
                        @endforeach


                </select>
            </div>

            {{-- Modelos --}}

            <div class="flex flex-col mb-2 text-left">
                <label class="mb-2"><strong>{{ __('Model') }}</strong></label>
                <select wire:model="model_id"
                        wire:change="fill_combos_fields"
                        class="form-select">
                    <option value="{{null}}">{{__("All")}}</option>
                    @foreach($modelsList as $model)
                        <option value="{{ $model->id }}">{{ $model->name  }}
                            ({{$model->vehicles_count }})
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Estilos --}}

            <div class="flex flex-col mb-2 text-left">

                <label class="mb-2"><strong>{{ __('Style') }}</strong></label>
                <select wire:model="style_id"
                         wire:change="fill_combos_fields"
                        class="form-select">
                    <option value="{{null}}">{{__("All")}}</option>
                    @foreach($stylesList as $style)
                        <option value="{{ $style->id }}">{{ $style->name  }}
                            ({{$style->vehicles_count }})
                        </option>
                    @endforeach
                </select>
            </div>

         </div>
    </div>
 </div>
