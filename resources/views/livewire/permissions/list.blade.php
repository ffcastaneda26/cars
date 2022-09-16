<tr>
    <td>{{ $record->name }}</td>
    <td>
        @if(App::isLocale('en'))
            {{ $record->english }}
        @else
        {{ $record->spanish }}
        @endif
    </td>
    <td>{{ $record->slug }}</td>
    @include('common.crud_actions')
</tr>
