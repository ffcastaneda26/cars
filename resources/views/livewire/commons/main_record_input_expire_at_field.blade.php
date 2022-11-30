<div class="form-group">
    <input type="date"
            wire:model="main_record.expire_at"
            min="<?php $hoy = date('Y-m-d'); echo $hoy;?>"
            class="form-control mb-2"
    >
</div>
