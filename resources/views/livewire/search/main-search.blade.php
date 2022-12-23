
<div class="container-fluid">

    @include('common.crud_header')
    @section('content')

        <div class="d-flex justify-around">
            <div style="width: 30%">
                @livewire('filters-text')
            </div>

        </div>

        <div>
           @livewire('search-vehicles')
        </div>

    @endsection

</div>

