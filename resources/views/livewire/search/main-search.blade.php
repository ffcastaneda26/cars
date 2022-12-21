
<div class="container-fluid">

    @include('common.crud_header')
    @section('content')

        <div class="d-flex justify-around">
            <div style="width: 75%">
                @livewire('filters-text')
            </div>

            <div class="ml-10" style="width: 20%">
                @livewire('show-favorites')
            </div>
        </div>

        <div>
           @livewire('show-vehicles')
        </div>

    @endsection

</div>

