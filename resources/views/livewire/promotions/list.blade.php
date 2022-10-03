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
    <td>{{ $record->expiration_type }}</td>


    <td>{{$record->days_expire_gifts}}</td>
    <td>
        @if($record->expire_at_coupons)
            {{date('M',strtotime($record->expire_at_coupons)) . '-' .
            date('d',strtotime($record->expire_at_coupons))  . '-' .
            date('Y',strtotime($record->expire_at_coupons)) }}
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

