<div class="inline bg-white overflow-hidden shadow-xl sm:rounded-lg  m-4">
    <label class="font-semibold justify-start items-start text-base"> {{__('Show Only Linked Records')}}</label>
    <input type="checkbox"
            class="h5 form-checkbox border-2"
            wire:click="$toggle('only_linked')"
    >
</div>
