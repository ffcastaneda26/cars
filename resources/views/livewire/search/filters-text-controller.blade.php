<div>
    {{ $search }}
    <div class="search-bar">
        <x-jet-input type="text"
                    wire:model="search"
                    wire:change="sendFilters"
                    class="search-input form-control w-full"
                    placeholder="{{__($search_label)}}"
        />

    </div>
</div>
