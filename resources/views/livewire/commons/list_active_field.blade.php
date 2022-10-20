<td class="text-center">
    @if($record->active)
        <label>  {{__('Yes')}}</label>
    @else
        <label class="text-danger">{{__('No')}}</label>
    @endif
</td>
