<tr>
    <td>{{ $record->name }}</td>
    <td>{{ $record->phone }}</td>
    <td>{{ $record->model_year }}</td>
    <td>{{ $record->make->name }}</td>
    <td>{{ $record->model->name }}</td>
    <td>{{ $record->type_financing }}</td>
    <td>{{ $record->downpayment }}</td>

    @include('common.crud_actions')
</tr>

