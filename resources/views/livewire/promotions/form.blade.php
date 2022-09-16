<div class="container">
    <div class="text-danger">
        <x-jet-validation-errors></x-jet-validation-errors>
    </div>
    <div class="row align-items-start">
        <div class="col-md-3 flex flex-col">
            <label class="input-group-text mb-2">{{__("Spanish")}}</label>
            <label class="input-group-text mb-2">{{__("English")}}</label>
            <label class="input-group-text mb-2">{{__("Begin  At")}}</label>

            <label class="input-group-text mb-4">{{__("Expire At")}}</label>
            <label class="input-group-text mb-2">{{__("Active?")}}</label>

        </div>

        <div class="col flex flex-col">
            {{-- Español --}}
            <div class="flex-flex-column">
                <input type="text" wire:model="main_record.spanish" required placeholder="{{__("Spanish")}}"
                class="form-control mb-2"
                maxlength="25">
            </div>


            {{-- Inglés --}}
            <div class="flex-flex-column">
                <input type="text" wire:model="main_record.english" required placeholder="{{__("English")}}"
                class="form-control mb-2"
                maxlength="25">
            </div>


            {{-- Fecha Inicia --}}
            <div class="flex-flex-column mb-4">
                <input type="date"
                        wire:model="main_record.begin_at"
                        required min=<?php $hoy = date('Y-m-d'); echo $hoy; ?>
                >
            </div>


            {{-- Fecha Expira --}}
            <div class="flex-flex-column mb-4">
                <input type="date"
                        wire:model="main_record.expire_at"
                        required min=<?php $hoy = date('Y-m-d'); echo $hoy; ?>
                >
            </div>

            {{-- ¿Activo? --}}
            <div class="flex-flex-column">
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" wire:model="active" class="btn-check" name="type" id="active" value="1">
                    <label class="btn btn-outline-success" for="active">{{__('Active')}}</label>

                    <input type="radio" wire:model="active" class="btn-check" name="type" id="inactive" value="0">
                    <label class="btn btn-outline-danger" for="inactive">{{__('Inactive')}}</label>

                </div>
            </div>
        </div>
    </div>
</div>
