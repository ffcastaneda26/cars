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
                           <option value="">{{__("All")}}</option>

                         @foreach($makesList as $make_list)
                            <option value="{{ $make_list->id }}">{{ $make_list->name }}</option>
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



         </div>
    </div>
 </div>
