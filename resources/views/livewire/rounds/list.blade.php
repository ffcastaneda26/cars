<tr>
    <td>{{ $record->id }}</td>
    <td>
        {{ date('l F d Y', strtotime($record->from)) }}
    </td>
    <td>
        {{ date('l F d Y', strtotime($record->to)) }}
    </td>

    @include('livewire.commons.list_active_field')
    @include('common.crud_actions')
</tr>

