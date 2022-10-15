<div class="card" style="margin-top:15%">
    <div class="card-body">
        <div class="p-2">
            <h3 class="text-center">{{ __('Type Code') }}</h3>
            <div class="row justify-content-center">
                <div class="mb-3 col-lg-4">
                    <input type="text"
                        wire:model="code"
                        wire:keyup="validate_code"
                        maxlength="8"
                        pattern="[A-Z]{4}[0-9]{4}"
                        class="form-control mb-2"
                        @if($request_competidor_data) 
                            disabled 
                        @endif
                    >
                </div>
            </div>

       </div>
    </div>
   {{-- Mensaje del código --}}

    @if ($error_message)
        <div class="card">
            <div class="card-body">
                <div class="p-2 text-danger">
                    <h2>{{ $error_message }}</h2>
                </div>
            </div>
        </div>
    @endif

</div>