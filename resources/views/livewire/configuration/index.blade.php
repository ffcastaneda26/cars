@include('common.crud_header')

<div class="container">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        @include('common.crud_message')

        @include($view_search)
        @if ($show_only_linked)
            <div>
                @include('common.read_only_linked_records')
            </div>
        @endif

        <div class="row">
            <div class="col-lg-6">
                @include($view_index)
            </div>
        </div>
    </div>
</div>