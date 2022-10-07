<div class="container">
    <div class="text-danger">
        <x-jet-validation-errors></x-jet-validation-errors>
    </div>
    <div class="row align-items-start">
        <div class="col-md-4 flex flex-col">
            <label class="input-group-text mb-2">{{__("Name")}}</label>
            <label class="input-group-text mb-2">{{__("Alias")}}</label>
            <label class="input-group-text mb-2">{{__("Short")}}</label>
            <label class="input-group-text mt-2">{{ __('Active?') }}</label>
        </div>

        <div class="col flex flex-col">
            {{-- Nombre --}}
            <div class="flex-flex-column">
                <input type="text"
                        wire:model="main_record.name"
                        required
                        placeholder="{{__("Name")}}"
                        maxlength="50"
                        class="form-control mb-2"
                >
            </div>
            {{-- Alias --}}
            <div class="flex-flex-column">
                <input type="text"
                        wire:model="main_record.alias"
                        maxlength="20"
                        placeholder="{{__("Alias")}}"
                        class="form-control mb-2"
                >
            </div>

            {{-- Corto --}}
            <div class="flex-flex-column">
                <input type="text"
                        wire:model="main_record.short"
                        maxlength="6"
                        placeholder="{{__("Short")}}"
                        class="form-control mb-2"
                >
            </div>

            {{-- ¿Activo? --}}

            <div class="flex-flex-column">
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" wire:model="active" class="btn-check" name="type" id="active" value="1">
                    <label class="btn btn-outline-success" for="active">{{__('Active')}}</label>

                    <input type="radio" wire:model="active" class="btn-check ml-4" name="type" id="inactive" value="0">
                    <label class="btn btn-outline-danger" for="inactive">{{__('Inactive')}}</label>
                </div>
            </div>



        </div>
    </div>

    {{-- Logotipo  --}}
    <div class="row align-items-start">
        <div class="col-lg-10  col-md-8 mb-4">
            <label class="fs-5">{{ __('Logo') }}</label>
            <input type="file" wire:model="file_path" class="form-control">
        </div>

        <div class="col-lg-8">
            @if (isset($file_path))
                Preview:
                <img src="{{ $file_path->temporaryUrl() }}" class="avatar-md">
            @endif

            @if ($main_record->logotipo)
                <img src="{{ asset('storage/public' . $main_record->logotipo) }}"
                    class="mt-1 avatar-lg"
                    alt="Logo"
                >
            @endif

        </div>
    </div>
</div>