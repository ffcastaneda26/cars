<tr>
    <td>{{ $record->name }}</td>
    <td>{{ $record->email }}</td>
    <td>{{ $record->address }}</td>
    <td>{{ $record->phone }}</td>
    <td>{{ $record->code }}</td>
    <td class="text-center">

        @if($record->active)
            <label>  {{__('Yes')}}</label>
        @else
            <label class="text-danger">{{__('No')}}</label>

        @endif

    </td>
    <td class="text-center">
        @if($record->logotipo)
            <img class="avatar-md" src="{{url('storage/'.$record->logotipo)}}" alt="{{__('Image')}}">
        @endif
    </td>
    @include('common.crud_actions')
</tr>

