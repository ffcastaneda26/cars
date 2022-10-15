<div>
    <h1 class="text-center">{{ __('Quiniela Mundialista') }}</h1>
    <div>
        <div class="account-pages">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    {{-- Código de Cupón --}}
                    @if($request_competidor_code && !$request_competidor_data && !$request_competidor_picks)
                        @include('livewire.competidors.request_competidor_code')
                    @endif

                    {{-- Solicita datos del competidor --}}
                    @if ($request_competidor_data)
                        @include('livewire.competidors.request_competidor_data')
                    @endif

                    {{-- Solicita los Pronósticos --}}

                    @if($request_competidor_picks)
                        @include('livewire.competidors.request_competidor_picks')

                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
