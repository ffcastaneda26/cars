
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
<div class="contanier-fluid">
    @include('livewire.packages.form_name_price')


        <div class="row d-flex">
                @include('livewire.packages.form_col_01')
                @include('livewire.packages.form_col_02')
        </div>
    </div>

</div>
