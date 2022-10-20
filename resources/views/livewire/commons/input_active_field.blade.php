    {{-- ¿Activo? --}}

    <div class="flex-flex-column">
        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
            <input type="radio" wire:model="active" class="btn-check" name="type" id="active" value="1">
            <label class="btn btn-outline-success" for="active">{{__('Active')}}</label>

            <input type="radio" wire:model="active" class="btn-check ml-4" name="type" id="inactive" value="0">
            <label class="btn btn-outline-danger" for="inactive">{{__('Inactive')}}</label>
        </div>
    </div>
