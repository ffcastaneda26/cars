@if($main_record->zipcode)
    <div class="flex-flex-column">
        <input type="text"
            wire:model="town_state"
            disabled
            class="form-control mb-2"
        >
    </div>
@endif
