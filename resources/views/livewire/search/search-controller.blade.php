
<div class="container-fluid">

    @include('common.crud_header')
    @section('content')
        <div>
            @livewire('filters-text-controller')
        </div>

        <div>
            @livewire('search-results-controller')
        </div>

    @endsection

</div>

