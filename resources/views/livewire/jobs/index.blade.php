<div class="container-fluid">
    @include('common.crud_header')
    @include('common.crud_message')

    <div class="d-flex flex-row align-items-start col-md-8 gap-2 mb-2">
        {{--  Boton para crear Registro  --}}
            @if($allow_create)
                <button wire:click="$set('open_wizard', 'true')" class="btn btn-info">
                    {{__($create_button_label)}}
                </button>
            @endif

        {{-- ¿Que formulario debo mostrar?
        En caso de que  este agreando o editando:
        1) ¿Que formulario debo mostrar?
        $form_number_show
        01= form_01.blade.php
        02= form_02.blade.php

        ¿Mostrar boton atras?: $show_back_button: true/false
        = true por defecto
        si $form_number_show = ultima (4) --> false
        ¿Mostarr boton siguiente?: $show_foward_button: true/false
        si $form_number_show = primera  (1) --> false --}}

        {{--  Vista busquedas de items  --}}
        @if(isset($view_search))
            @include($view_search)
        @endif
    </div>

    {{--  Modal para confirmar elemento --}}
    @if($confirm_delete)
        @include('common.confirm_delete')
    @endif
    @if($view_table && !$open_wizard)
        <div class="table-responsive bg-white">
            @include('common.crud_table')
        </div>
    @endif
    {{-- Formulario Crear o Editar --}}
    @if($open_wizard)
        @include('livewire.jobs.form_wizard')
    @endif
</div>
