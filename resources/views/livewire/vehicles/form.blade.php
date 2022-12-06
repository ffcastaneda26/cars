<div class="container">

    @include('livewire.vehicles.form_search')


    <div class="contanier-fluid">

        <x-jet-validation-errors></x-jet-validation-errors>
        <div class="row align-items-start">
            @if($show_form)
                @include('livewire.vehicles.form_col_01')
                @include('livewire.vehicles.form_col_02')
                @include('livewire.vehicles.form_col_03')
            @else
                @include('livewire.vehicles.form_col_01_labels')
                @include('livewire.vehicles.form_col_02_labels')
                @include('livewire.vehicles.form_col_03_labels')

            @endif

        </div>
    </div>
</div>
