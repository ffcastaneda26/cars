<tr>
    <td>{{ $record->name }}</td>
    <td>
        @if(App::isLocale('en'))
            {{ $record->english }}
        @else 
            {{ $record->spanish }}
        @endif
    </td>
    <td class="text-center">
        <input type="checkbox" disabled
        @if($record->full_access)  checked @endif>
    </td>
    @include('common.crud_actions')
</tr>