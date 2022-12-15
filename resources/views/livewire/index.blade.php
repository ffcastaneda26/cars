<div class="container-fluid">
        @include('common.crud_header')
        @include('common.crud_message')

        <div class="d-flex flex-row align-items-start col-md-8 gap-2 mb-2">
            {{--  Boton para crear Registro  --}}
            @if($allow_create)
                @include('common.crud_create_button')
            @endif

            {{--  Vista busquedas de items  --}}
            @if(isset($view_search))
            {{ $search }}
                @include($view_search)
            @endif
        </div>

        {{--  Modal para confirmar elemento --}}
        @if($confirm_delete)
            @include('common.confirm_delete')
        @endif

        {{-- Detalle de registros --}}
        @if($view_table)
            <div class="table-responsive bg-white">
                @include($view_common_table)
            </div>
        @endif

        {{-- Formulario Crear o Editar --}}
        @if($isOpen && isset($view_form))
            @include($view_crud_modal)
        @endif
</div>
