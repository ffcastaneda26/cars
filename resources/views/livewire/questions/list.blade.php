<tr>
    @if(App::isLocale('en'))
        <td>{{ $record->english }}</td>
        <td>{{ $record->type_question->english }}</td>
    @else
        <td>{{ $record->spanish }}</td>
        <td>{{ $record->type_question->spanish }}</td>
    @endif
    <td>{{ $record->order }}</td>

    @include('common.crud_actions')
</tr>

