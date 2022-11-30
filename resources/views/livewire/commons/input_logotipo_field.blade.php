<div class="row align-items-start">
    <div class="col-lg-10  col-md-8 mb-4">
        <label class="fs-5">{{ __('Logo') }}</label>
        <input type="file" wire:model="logotipo" class="form-control">
    </div>

    <div class="col-lg-8">
        @if (isset($logotipo))
              <img src="{{ $logotipo->temporaryUrl() }}" class="avatar-md">
        @endif

        @if ($main_record->logotipo)
            <img src="{{ asset('storage/public' . $main_record->logotipo) }}"
                class="mt-1 avatar-lg"
                alt="Logo"
            >
        @endif

    </div>
</div>
