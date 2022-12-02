<tr>
    <td>{{ $record->id }}</td>
    <td>{{ $record->name }}</td>
    <td class="text-center">
        @if ($record->logotipo)k
            <img src="{{url('storage/'.$record->logotipo)}}" alt="{{__('Image')}}">
        @endif
    </td>
    @include('common.crud_actions')
</tr>
