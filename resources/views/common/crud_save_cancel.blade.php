
<div class="d-flex justify-content-end">
    
        <span class="mx-2">
            <button wire:click="closeModal()" type="button"
                class="btn btn-danger">
                {{__("Cancel")}}
            </button>
        </span>
        <span class="mx-2">
            <button wire:click.prevent="store()" type="button"
                class="btn btn-success">
                {{__("Save")}}
            </button>
        </span>
  
</div>
