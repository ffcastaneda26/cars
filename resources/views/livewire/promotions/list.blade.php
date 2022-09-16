<tr>
    <td>{{ $record->spanish }}</td>
    <td>{{ $record->english }}</td>
    <td>
        {{date('M',strtotime($record->begin_at)) . '-' .
        date('d',strtotime($record->begin_at))  . '-' .
        date('Y',strtotime($record->begin_at)) }}
    </td>
    <td>
        {{date('M',strtotime($record->expire_at)) . '-' .
        date('d',strtotime($record->expire_at))  . '-' .
        date('Y',strtotime($record->expire_at)) }}
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

