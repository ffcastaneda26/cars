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
                <select wire:model="make_id"
                           wire:change="sendFiltersList('make',$event.target.value)"class="form-select">
                        <option value="null">{{__("All")}}</option>
                         @foreach($makesList as $make_list)
                            <option value="{{ $make_list->id }}">{{ $make_list->name }}</option>
                        @endforeach


                </select>
            </div>

            {{-- Modelos --}}

            <div class="flex flex-col mb-2 text-left">
                <label class="mb-2"><strong>{{ __('Model') }}</strong></label>
                <select wire:model="model_id"
                        wire:change="sendFiltersList('model_id',$event.target.value)"class="form-select">
                    <option value="0">{{__("All")}}</option>
                    @foreach($modelsList as $model)
                        <option value="{{ $model->id }}">{{ $model->name  }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Estilos --}}

            <div class="flex flex-col mb-2 text-left">

                <label class="mb-2"><strong>{{ __('Style') }}</strong></label>
                <select wire:model="style_id"
                        wire:change="sendFiltersList('style_id',$event.target.value)"class="form-select">
                    <option value="">{{__("All")}}</option>
                    @foreach($stylesList as $style)
                        <option value="{{ $style->id }}">{{ $style->name  }}</option>
                    @endforeach
                </select>
            </div>



         </div>
    </div>
 </div>
