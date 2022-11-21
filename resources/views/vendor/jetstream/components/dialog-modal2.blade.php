<div class="modal fade bs-example-modal-lg show" tabindex="-1" aria-labelledby="myModal" style="display: block; padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-header">
            <h5 class="modal-title mt-0" id="myModal"> {{$create_button_label}}</h5>
            <button type="button" class="btn-close" wire:click.prevent="closeModal()"
            data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="container">
            <div class="text-danger">
                <x-jet-validation-errors></x-jet-validation-errors>
            </div>
            <div class="row align-items-start">
                <div class="col-md-4 flex flex-col">
                    <label class="input-group-text mb-2">{{__("Spanish")}}</label>
                    <label class="input-group-text mb-2">{{__("Short")}}</label>
                    <label class="input-group-text mb-2">{{__("English")}}</label>
                    <label class="input-group-text mb-2">{{__("Short")}}</label>
                </div>

                <div class="col flex flex-col">
                    {{-- Español --}}
                    <div class="flex-flex-column">
                        <input type="text" wire:model="main_record.spanish" required placeholder="{{__("Spanish")}}"
                        class="form-control mb-2"
                        maxlength="25">
                    </div>

                    {{-- Corto Español --}}
                    <div class="flex-flex-column">
                        <input type="text" wire:model="main_record.short_spanish" required placeholder="{{__("Short")}}"
                        class="form-control mb-2"
                        maxlength="6">
                    </div>

                    {{-- Inglés --}}
                    <div class="flex-flex-column">
                        <input type="text" wire:model="main_record.english" required placeholder="{{__("English")}}"
                        class="form-control mb-2"
                        maxlength="25">
                    </div>

                    {{-- Corto en Inglés --}}
                    <div class="flex-flex-column">
                        <input type="text" wire:model="main_record.short_english"
                        required placeholder="{{__("Short")}}"
                        class="form-control mb-2"
                        maxlength="6">
                    </div>

                </div>
            </div>
        </div>

        <div class="modal-footer">
            @include('common.crud_save_cancel')
        </div>
        <div class="modal-content">
            @include('common.crud_modal_header')

            @include($view_form)

            @include('common.crud_modal_footer')

        </div>
    </div>
</div>
