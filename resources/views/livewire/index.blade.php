<div class="container-fluid">
    @if($go_dashboard)
        @livewire('dashboard-controller')
    @else
        @include('common.crud_header')
        @include('common.crud_message')

        <div class="d-flex flex-row align-items-start col-md-8 gap-2 mb-2">
            {{--  Boton para crear Registro  --}}
            @if($allow_create)
                @include('common.crud_create_button')
            @endif

            {{--  Vista busquedas de items  --}}
            @if(isset($view_search))
                @include($view_search)
            @endif
        </div>

        {{--  Modal para confirmar elemento --}}
        @if($confirm_delete)
            @include('common.confirm_delete')
        @endif

        {{-- Detalle de registros --}}
        <div class="table-responsive bg-white">
            @include('common.crud_table')
        </div>

        {{-- Formulario Crear o Editar --}}
        @if($isOpen && isset($view_form))
            @include('common.crud_modal_form')
        @endif
    @endif
</div>