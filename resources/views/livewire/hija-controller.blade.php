<div>
    <div class="card vehicle-card" style="width: 18rem;">
        <div class="card-header text-center" style="height: 50px">
            <h4 class="mt-1 p-1">Hija</h4>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-center">
               <input type="text" wire:model="valor" wire:keyup="enviar_a_padre">
            </div>
        </div>

        <div class="card-footer text-center">
            <button class="btn btn-info" wire:click="enviar_a_padre">Mandar a Padre</button>
        </div>
    </div>
</div>
