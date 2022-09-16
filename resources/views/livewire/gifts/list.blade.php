<tr>
    @if(App::isLocale('en'))
        <td>{{ $record->promotion->english }}</td>
        <td>{{ $record->english }}</td>
    @else
        <td>{{ $record->promotion->spanish }}</td>
        <td>{{ $record->spanish }}</td>
    @endif
    <td class="text-center">
        @if($record->active)
            <label>  {{__('Yes')}}</label>
        @else
            <label class="text-danger">{{__('No')}}</label>
        @endif
    </td>
    @include('common.crud_actions')
</tr>

