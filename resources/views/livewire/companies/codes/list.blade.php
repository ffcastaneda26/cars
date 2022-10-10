<tr>
    <td class="text-left">{{$record->company->name}}</td>
    <td class="text-left">{{$record->user->name}}</td>
    <td class="text-left">{{$record->total_codes}}</td>
    <td class="text-center">
        @if($record->printed)
            <label>  {{__('Yes')}}</label>
        @else
            <label class="text-danger">{{__('No')}}</label>
        @endif
    </td>
    @include('common.crud_actions')
</tr>

