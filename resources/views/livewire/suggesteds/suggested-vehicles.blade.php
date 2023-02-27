<div class="flex flex-row">
    <div class="ml-10">
        @include('livewire.suggesteds.aside')
    </div>
    <div class="w-full">
        <div class="relative px-2 m-2">
            @include('livewire.suggesteds.search')
        </div>
        <div class="flex">
            <h1 class="mx-4 font-bold text-xl">Used Make Vehicle</h1>
        </div>
        <div class="flex justify-between">
            @include('livewire.suggesteds.filter_and_order')
        </div>

        {{--  Lista de Vehiculos  --}}
        <div class="grid grid-cols-4 sm:grid-cols-1 gap-1 mt-4">
            @include('livewire.suggesteds.list_vehicles_suggested')
        </div>
    </div>
</div>