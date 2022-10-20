<div class="row align-items-start">
    <div class="col-lg-10  col-md-8 mb-4">
        <label class="fs-5">{{ __('Logo') }}</label>
        <input type="file" wire:model="file_path" class="form-control">
    </div>

    <div class="col-lg-8">
        @if (isset($file_path))
            {{__('Preview:')}}
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
