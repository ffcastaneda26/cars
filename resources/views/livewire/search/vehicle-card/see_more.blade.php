
<div class="modal fade bs-example-modal-lg show" tabindex="-1" aria-labelledby="myModal" style="display: block; padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header modal-ver-mas-fondo-encabezado">
                <h5 class="modal-title mt-0" id="myModal"> {{ $vehicle->model_year }} {{ $vehicle->make }}  {{ $vehicle->model }}</h5>
                <button type="button"
                        wire:click.prevent="$toggle('show_more')"
                        class="btn-close"
                        data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>

            <div class="contanier-fluid mt-2 modal-ver-mas-fondo-contenido">
                <div class="row d-flex">
                    @include('livewire.search.vehicle-card.form_col_01_labels')
                    @include('livewire.search.vehicle-card.form_col_01_data')
                    @include('livewire.search.vehicle-card.form_col_02_labels')
                    @include('livewire.search.vehicle-card.form_col_02_data')
                </div>
            </div>
        </div>
    </div>
</div>
