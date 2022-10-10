<tr>
    <td>{{ $record->name }}</td>
    <td>{{ $record->alias }}</td>
    <td>{{ $record->short }}</td>


    <td class="text-center">
        @if($record->logotipo)
            {{-- <img  src="{{url('storage/'.$record->logotipo)}}" alt="{{__('Image')}}"> --}}
            <img class="avatar-sm" src="{{asset('/images/'. $record->name . '.jfif')}}" alt=""></td>
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

