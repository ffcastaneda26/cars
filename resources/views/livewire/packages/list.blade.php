<tr>
    <td>{{ $record->name }}</td>
    <td class="text-right">${{number_format($record->price, 2, '.', ',') }}</td>
    @include('common.crud_actions')
</tr>

