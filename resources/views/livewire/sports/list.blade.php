<tr>
    <td>{{ $record->spanish }}</td>
    <td>{{ $record->short_spanish }}</td>
    <td>{{ $record->english }}</td>
    <td>{{ $record->short_english }}</td>
    @include('livewire.commons.list_logotipo_field')

    <td class="text-center">
        @if($record->individual)
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

