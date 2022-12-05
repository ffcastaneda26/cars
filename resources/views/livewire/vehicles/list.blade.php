<tr>
    <td>{{ $record->make }}</td>
    <td>{{ $record->model }}</td>
    <td>{{ $record->model_year }}</td>
    <td>{{ $record->product_type}}</td>
    <td>{{ $record->body}}</td>
    <td>{{ $record->trim}}</td>
    <td>{{ $record->miles}}</td>
    <td class="text-center">
        <img src="{{ $record->available ? asset('images/acertado.png') : asset('images/fallado.png')}}"
            alt="{{ $record->available ? __('Yes') : __('No') }}"
            height="24px"
            width="24px"
            class="rounded-circle"
        >
    </td>
    @include('common.crud_actions')
</tr>
