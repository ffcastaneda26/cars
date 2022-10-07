<tr>
    <td>{{ $record->name }}</td>
    <td>{{ $record->alias }}</td>
    <td>{{ $record->short }}</td>


    <td class="text-center">
        @if($record->logotipo)
            <img class="rounded" width="50px" height="50px" src="{{asset('storage/public/' . $record->logotipo)}}" alt="{{__('Image')}}">
        @endif
    </td>
    <td class="text-center">
        @if($record->request_score)
            <label>  {{__('Yes')}}</label>
        @else
            <label class="text-danger">{{__('No')}}</label>
        @endif
    </td>

    <td class="text-center">
        @if($record->active)
            <label>  {{__('Yes')}}</label>
        @else
            <label class="text-danger">{{__('No')}}</label>
        @endif
    </td>
    @include('common.crud_actions')
</tr>

