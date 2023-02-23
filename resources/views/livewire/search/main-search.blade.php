
<div class="container-fluid">

    @include('common.crud_header')
    @section('content')
        {{--  TODO: Incluir o no filtro superior  --}}
        <div>
            @livewire('filters-text')
        </div>

        <div>
           @livewire('search-vehicles')
        </div>

    @endsection

</div>

