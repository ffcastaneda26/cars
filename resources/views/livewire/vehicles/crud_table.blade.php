@if(isset($records) && $records->count())
    <table class="table table-hover mb-0">
        @if(isset($view_table))
            @include($view_table)
        @endif

        <tbody>
            @foreach ($records as $record)
                @include($view_list)
            @endforeach
           
        </tbody>
    </table>
    @include('common.crud_pagination')
@else
    @include('common.no_records_found')
@endif
