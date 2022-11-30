<div class="flex-flex-column">
    <input type="text"
        wire:model="main_record.zipcode"
        wire:change="read_zipcode"
        maxlength="5"
        onkeypress="return only_numbers(event, this)"
        class="form-control mb-2"
    >
</div>
