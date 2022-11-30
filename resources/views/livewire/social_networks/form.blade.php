<div class="container">
    <x-jet-validation-errors></x-jet-validation-errors>
    <div class="row align-items-start">
        <div class="col-md-3 flex flex-col">
            <label class="input-group-text mb-2">{{ __('Name') }}</label>
            <label class="input-group-text mb-2">{{ __('Active') }}</label>

        </div>

            <div class="col flex flex-col">
                <form>
                {{-- Nombre Marca --}}
                <div class="flex-flex-column">
                    <input type="text" wire:model="main_record.name"
                    maxlength="200"
                    name="name"
                    placeholder="{{__("Name")}}"
                    class="form-control mb-2">
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

            </form>
            </div>
            {{-- Logotipo  --}}
            <div class="row align-items-start">
                <div class="col-lg-10  col-md-8 mb-4">
                    <label class="fs-5">{{ __('Logotipo') }}</label>
                    <input type="file" wire:model="logotipo" class="form-control">
                </div>
                <div class="col-lg-8">
                    @if (isset($logotipo))
                        <img src="{{ $logotipo->temporaryUrl() }}" class="avatar-md">
                    @endif
                </div>
            </div>
    </div>
</div>
