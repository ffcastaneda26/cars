<tr>

    @if(App::isLocale('en'))
        <td>{{ $record->question->english }}</td>
        <td>{{ $record->english }}</td>
    @else
        <td>{{ $record->question->spanish }}</td>
        <td>{{ $record->spanish }}</td>
    @endif
    @include('common.crud_actions')
</tr>

