<tr>
    <td>{{ $record->name }}</td>
    <td>{{ $record->english }}</td>
    <td>{{ $record->spanish}}</td>
    <td class="text-center">
        {{ $record->full_access ? __('Yes') : __('No')}}
    </td>
    @include('common.crud_actions')
</tr>
