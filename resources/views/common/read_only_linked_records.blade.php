<div class="h5 inline bg-white overflow-hidden shadow-xl sm:rounded-lg px-2 py-2 m-4">
    <label class="font-semibold justify-start items-start text-base"> {{__('Show Only Linked Records')}}</label>
    <input type="checkbox" class="h5 form-checkbox border-2 text-gray-600 border-red-600"
        wire:click="$toggle('only_linked')" style="transform: scale(1.5);"
    >
</div>