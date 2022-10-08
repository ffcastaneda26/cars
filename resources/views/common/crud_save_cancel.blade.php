
<div class="d-flex justify-content-end">
    
        <span class="mx-2">
            <button wire:click="closeModal()" type="button"
                class="btn btn-danger">
                {{__("Cancel")}}
            </button>
        </span>

        <span class="mx-2">
            <button type="button"
                    wire:click.prevent="store()" 
                    @if(!$allow_save) disabled @endif
                    class="btn btn-success">
                {{__("Save") }}
               
            </button>
        </span>
  
</div>
