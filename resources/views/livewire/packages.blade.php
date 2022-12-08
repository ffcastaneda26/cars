<div>
    <div class="text-center">
        <h1>HOLA ESTAMOS PROBANDO USAR EL MODAL DE JETSTREAM</h1>
        <h2>Primero vamos a abrir la forma tradicional, luego intentaremos abrir la del componente</h2>
    </div>
                {{--  Boton para crear Registro  --}}
    @if($allow_create)
        @include('common.crud_create_button')
    @endif

    @if($isOpen)
        <x-jet-modal maxwidth="md"></x-jet-modal>
    @endif
</div>
