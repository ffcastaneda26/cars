<div>
    <div class="cars-container">
            {{--  Nombre y telefono  --}}
            <div class="element mr-2">
                <x-jet-input type="text" wire:model="search" class="search-input form-control w-full" placeholder="{{__($search_label)}}"/>
            </div>

            {{--  Años  --}}
            <div class="element mr-2">
                @php
                    $current_month = date("m");
                    if( $current_month >= 8){
                        $axo_actual  =  date("Y") + 1;
                    }else{
                        $axo_actual  =  date("Y");
                    }
                @endphp

                <select wire:model="search_model_year"
                            class="form-select mb-2">
                    <option value="">{{__("Model Year")}}</option>
                    @for ($axo=$axo_actual ;  $axo>=$axo_actual-13 ; $axo--)
                        <option value="{{ $axo }}" class="normal_option">
                                {{$axo }}
                        </option>

                    @endfor
                </select>
            </div>

            {{-- Marcas --}}
            <div class="element mr-2">
                <select wire:model="search_make_id"
                        class="form-select mb-2
                        {{ $errors->has('main_record.make_id') ? 'field_error' : '' }}"
                    >
                    <option value="">{{__("Make")}}</option>
                    @foreach($makesList as $make_select)
                            <option value="{{ $make_select->id }}" class="normal_option">
                                {{$make_select->name }}
                            </option>
                    @endforeach
                </select>
            </div>


            {{--  Modelos  --}}
            <div class="element mr-2">
                <select wire:model="search_model_id"
                        class="form-select  mr-5">
                    <option value="{{null}}">{{__("Model")}}</option>
                    @foreach($modelsList as $model)
                        <option value="{{ $model->id }}">{{ $model->name  }}
                            ({{$model->vehicles_count }})
                        </option>
                    @endforeach
                </select>
            </div>

    </div>

</div>
