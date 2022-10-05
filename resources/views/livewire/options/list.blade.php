<tr>

    @if(App::isLocale('en'))
        <td>{{ $record->question->english }}</td>
        <td>{{ $record->english }}</td>
        <td>
            @if($record->dependent_question)
                {{$record->dependent_question->english}}
            @endif
        </td>
    @else
        <td>{{ $record->question->spanish }}</td>
        <td>{{ $record->spanish }}</td>
        <td>
            @if($record->dependent_question)
                {{$record->dependent_question->spanish}}
            @endif
        </td>

    @endif
    @include('common.crud_actions')
</tr>

