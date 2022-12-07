
<style>
    .caja_grande {
        min-height: 480px;
    }
    .field_error {
        background-color: red;
        color: yellow;
      }
      
    .error_box {
        background-color: white;
        color: red;
        font-family: 'Times New Roman', Times, serif;
        font: bold;
    }

    .normal_option{
        background-color: white;
        color: black;
    }
    
</style>
<div class="container">

    @include('livewire.vehicles.form_search')


    <div class="contanier-fluid">
        {{-- <x-jet-validation-errors></x-jet-validation-errors> --}}
        <div class="row align-items-start">
            @if($show_form)
                @include('livewire.vehicles.form_col_01')
                @include('livewire.vehicles.form_col_02')
                @include('livewire.vehicles.form_col_03')
            @else
                <div class="w-auto col flex flex-col flex-wrap caja_grande"></div>
            @endif

        </div>
    </div>

</div>
