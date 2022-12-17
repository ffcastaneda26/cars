<style>
    .lista-contendor{
        display: flex;
        flex-wrap: wrap;
        justify-content: start;
        margin: 10px;
        border: 20px;
        padding: 10px;
        gap: 20px;

    }
</style>

<div class="container-fluid">
    <div class="text-center"><h1>Controladores anidados</h1></div>
    @section('content')
    <div class="lista-contenedor">

    </div>
    <div class="lista-contendor">

        @livewire('padre-controller')

        <div>
            <div class="card vehicle-card" style="width: 18rem;">
                <div class="card-header text-center" style="height: 50px">
                    <h5 class="mt-1 p-1">CONTENEDOR=PADRE</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <p class="card-text text-left">Hijo</p>
                        <p class="card-text text-left" id="hijo">{{ $hijo }}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="card-text text-left">Hija</p>
                        <p class="card-text text-left">{{ $hijo2 }}</p>
                    </div>
                </div>

            </div>
        </div>

    </div>

    @endsection

</div>
@section('scripts')
    {{-- <script>
        Livewire.on('leer_hijos', value => {
            // alert('Se ha agregado: ' + value);
            @this.hijo = value
            alert( @this.hijo )
        })
    </script> --}}
@endsection
