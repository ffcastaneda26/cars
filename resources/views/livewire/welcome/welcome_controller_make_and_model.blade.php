<div class="flex justify-center mt-1 relative rounded-md shadow-sm">
    <ul>
        <div>
            @if (!empty($makes))
                <li class="bg-gray-500 text-center w-40" selected>{{ __('Makes') }}</li>
                @foreach ($makes as $make)
                    <button class="btn btn-primary block">
                        <a class="text-black font-semibold font-headline hover:text-gray-400"
                            href="{{ url('suggested_vehicles/' . $make['make']) }}">
                            {{ $make['make'] }}
                        </a>
                    </button>
                @endforeach
            @endif
        </div>
        @if (!empty($models))
            <div>
                {{-- <select wire:model="model" wire:change="toggle_model_to_query"> --}}
                <li class="bg-gray-500 text-center w-40" selected>{{ __('Models') }}</li>
                @foreach ($models as $model_select)
                    <button class="btn btn-primary block">
                        <a class="text-black font-semibold font-headline hover:text-gray-400"
                            href="{{ url('suggested_vehicles/' . $query) }}">
                            {{ $model_select['make'] }} - {{ $model_select['model'] }}
                        </a>
                    </button>
                    {{-- <li value="{{$model_select['model']}}">{{$model_select['make']}} - {{$model_select['model']}}</li> --}}
                @endforeach
                {{-- </select> --}}
            </div>
        @endif
    </ul>
</div>