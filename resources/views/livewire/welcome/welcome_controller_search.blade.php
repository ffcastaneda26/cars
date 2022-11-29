<div class="mx-auto justify-center items-center text-center">
    <div class="flex justify-center mt-1 relative rounded-md shadow-sm">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 inline text-gray-500 rounded-full"
            fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8 16l2.879-2.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <input type="text" wire:model="query" aria-autocomplete="list" class="w-72 border-2 p-2"
            placeholder="{{ __('Make or Model') }}">
        <button style="background-color:#F35E33 "
            class="inline justify-center w-24 text-lg font-bold" >
            <a class="text-black font-semibold font-headline "
            @if (!$query)
                href="javascript:void(0)"
            @else
                href="{{ url('suggested_vehicles/' . $query) }}"
            @endif
                >
                {{ __('Search') }}
            </a>
        </button>
    </div>
</div>