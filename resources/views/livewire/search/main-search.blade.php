
<div class="container-fluid">

    @include('common.crud_header')
    @section('content')
        <div>
            @livewire('filters-search-top')
        </div>

        <div>
           @livewire('search-vehicles')
        </div>

    @endsection

</div>

