<tr>
    <td>{{ $record->id }}</td>
    <td>{{ $record->name }}</td>
    <td>{{ $record->email }}</td>
    <td>{{ $record->phone }}</td>
    <td>{{ $record->address}}</td>
    <td>{{ $record->zipcode}}</td>
    <td class="text-center">
        @if ($record->logotipo)
            <img src="{{url($record->logotipo)}}" class="avatar-lg" alt="image">
        @endif
    </td>
    <td class="text-center">
        <input type="checkbox" disabled
        @if($record->active)  checked @endif>
    </td>
    @include('common.crud_actions')
</tr>
