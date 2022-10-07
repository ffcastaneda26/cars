<tr>
    <td>{{ $record->name }}</td>
    <td>{{ $record->email }}</td>
    <td>{{ $record->address }}</td>
    <td>{{ $record->phone }}</td>
    <td class="text-center">
        @if($record->logotipo)
            <img class="avatar-md" src="{{url($record->logotipo)}}" alt="{{__('Image')}}">
        @endif
    </td>
    @include('common.crud_actions')
</tr>

