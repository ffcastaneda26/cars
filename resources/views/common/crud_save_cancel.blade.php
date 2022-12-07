
<div class="d-flex justify-content-end">

        <span class="mx-2">
            <button type="button"
                    wire:click="closeModal()"
                    wire:loading.remove wire:target="store"
                    class="btn btn-danger">
                {{__("Cancel")}}
            </button>
        </span>

        <div class="visible {{ $allow_save ? '' : 'invisible '}}">
            <span class="mx-2">
                <button type="button"
                        wire:click.prevent="store()"
                        wire:loading.remove wire:target="store"
                        {{ $allow_save ? '' : 'disabled'}}

                        class="btn btn-success">
                    {{__("Save") }}
                </button>


                <button type="button"
                        wire:click.prevent="store()"
                        wire:loading wire:target="store"
                        disabled
                        class="btn btn-warning">
                        {{__("Saving") }}
                </button>
            </span>
        </div>





</div>
