<div>
    <div class="grid justify-items-stretch">
        <div class="justify-self-center">
            @include('welcome_initial')
            <div class="justify-self-center">
                @include('livewire.welcome.welcome_controller_search')

                {{-- @if (!empty($makes) || !empty($models)) --}}
                    {{-- @include('livewire.welcome.welcome_controller_make_and_model') --}}
                {{-- @endif --}}
                @if (!empty($makes) || !empty($models))
                    <div class="mx-auto justify-center items-center text-center">
                        <select wire:model="make_model"
                                wire:change=""
                                class="select2-placeholder-multiple form-control"
                                multiple="multiple"
                                id="multi_placehodler"
                                size="{{$items_select}}">

                            @if (!empty($makes))
                                <optgroup class="text-center w-full" label="{{ __('Makes') }}">
                                    @foreach($makes as $make)
                                        <option value="{{$make['make']}}">{{$make['make']}}</option>
                                    @endforeach
                                </optgroup>
                            @endif

                            @if (!empty($models))
                                <optgroup class="text-center w-full" label="{{ __('Models') }}">
                                    @foreach ($models as $model_select)
                                        <option value="{{ $model_select['make'] }} - {{ $model_select['model'] }}">{{ $model_select['make'] }} - {{ $model_select['model'] }}</option>
                                    @endforeach
                                </optgroup>
                            @endif
                        </select>
                    </div>
                @endif


            </div>
        </div>
        @if (empty($makes) && empty($models))
            <div>
                @include('welcome_search_by_type_vehicle')
            </div>
        @endif
    </div>
</div>
