<tr>
    <td>{{ $record->id }}</td>
    <td>{{ $record->name }}</td>
    <td class="text-center">
        @if ($record->logotipo)
            <img src="{{Storage::url($record->logotipo)}}" class="avatar-sm" alt="image">

        @endif
    </td>
    @include('common.crud_actions')
</tr>
