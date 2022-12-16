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
    <div class="lista-contendor">
        @livewire('hijo-controller')
        @livewire('hija-controller')
        @livewire('padre-controller')


    </div>

    @endsection

</div>

