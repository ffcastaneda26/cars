<tr class="h5">
    <td>{{ $record->spanish }}</td>
    <td>{{ $record->english }}</td>
    <td class="text-center" style="background-color: {{ $record->color }};color: {{ $record->text_color }}">
        {{ $record->color .'-' . $record->text_color }}
    </td>
    @include('common.crud_actions')
</tr>

