
<div class="container-fluid">
    @include('common.crud_header')
    @section('content')

        <div class="search_left text-center">
            <h2>Filtros </h2>
            <div class="box_search_list_filters">
                @livewire('filters-list-controller')
            </div>
        </div>

        <div  class="search_right text-center">
            <div class="box_search_results_header text-center mb-2">
                <h1>Aqui va el filtro de la búsqueda y los resultados</h1>
            </div>


            <div class="box_search_text_filters">
                @livewire('filters-text-controller')
            </div>

            <div class="box_search_results">
                @livewire('search-results-controller')
            </div>



        </div>
    @endsection

</div>

