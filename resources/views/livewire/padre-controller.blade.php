<div>
    <div class="card vehicle-card" style="width: 18rem;">
        <div class="card-header text-center" style="height: 50px">
            <h5 class="mt-1 p-1">PADRE (Recibe de hijos)</h5>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <p class="card-text text-left">Hijo</p>
                <p class="card-text text-left">{{ $hijo }}</p>
            </div>
            <div class="d-flex justify-content-between">
                <p class="card-text text-left">Hijo 2</p>
                <p class="card-text text-left">{{ $hijo2 }}</p>
            </div>

        </div>


            <div class="card-footer text-center text-muted">
                @if($hijo && $hijo2)
                    <button class="btn btn-info" wire:click="enviar_a_contenedor">Mandar a Contenedor</button>
                @endif
            </div>


    </div>

    <div class="lista-contendor">
        @livewire('hijo-controller')
        @livewire('hijo2-controller')
    </div>
</div>
