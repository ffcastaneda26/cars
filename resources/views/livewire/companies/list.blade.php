<tr>
    <td>{{ $record->name }}</td>
    <td>{{ $record->email }}</td>
    <td>{{ $record->address }}</td>
    <td>{{ $record->phone }}</td>
    <td class="text-center">
        @if($record->logotipo)
            <img class="rounded" width="50px" height="50px" src="{{asset('storage/public/' . $record->logotipo)}}" alt="{{__('Image')}}">
        @endif
    </td>
    @include('common.crud_actions')
</tr>

