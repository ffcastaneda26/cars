<div class="container">
    <x-jet-validation-errors></x-jet-validation-errors>
    <div class="row align-items-start">
        <div class="w-auto flex flex-col">
            <label class="input-group-text mb-2">{{ __('Name') }}</label>
            <label class="input-group-text mb-2">{{ __('Slug') }}</label>
            <label class="input-group-text mb-2">{{ __('Enlgish') }}</label>
            <label class="input-group-text mb-2">{{ __('Spanish') }}</label>
        </div>

            <div class="col flex flex-col">
                <form>
                    {{-- Nombre --}}
                    <div class="flex-flex-column">
                        <input type="text"
                            wire:model="main_record.name"
                            maxlength="100"
                            placeholder="{{__("Name")}}"
                            class="form-control mb-2"
                        >
                    </div>

                    {{-- Slug --}}
                    <div class="flex-flex-column">
                        <input type="text"
                            wire:model="main_record.slug"
                            maxlength="100"
                            placeholder="{{__("Slug")}}"
                            class="form-control mb-2"
                        >
                    </div>

                    {{-- Inglés --}}
                    <div class="flex-flex-column">
                        <input type="text"
                            wire:model="main_record.english"
                            maxlength="100"
                                placeholder="{{__("English")}}"
                            class="form-control mb-2"
                        >
                    </div>

                    {{-- Español --}}
                    <div class="flex-flex-column">
                        <input type="text"
                            wire:model="main_record.spanish"
                            maxlength="100"
                                placeholder="{{__("Spanish")}}"
                            class="form-control mb-2"
                        >
                    </div>


                </form>
            </div>

    </div>
</div>
