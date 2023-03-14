
<div class="container-fluid">
    @include('common.crud_header')

    @section('content')
        <div>
            @livewire('filters-search-top', ['style_route' => $style_search])
        </div>

        <div>
           @livewire('search-vehicles',['style_route' => $style_search])
        </div>
    @endsection
</div>

