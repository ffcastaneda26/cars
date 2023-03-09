<div class="container">
    <div class="row"></div>
                <div class="text-danger">
                    <x-jet-validation-errors></x-jet-validation-errors>
                </div>

                <div class="row align-items-start">
                    <div class="col-md-4 flex flex-col">
                        <label class="input-group-text mb-2">{{__("Name")}}</label>
                    </div>

                    <div class="col flex flex-col">
                        {{-- Nombre --}}
                        <div class="flex-flex-column">
                            <input type="text" wire:model="main_record.name" required placeholder="{{__("Style")}}"
                            class="form-control mb-2"
                            maxlength="25">
                        </div>


                    </div>
                </div>
    </div>
</div>
