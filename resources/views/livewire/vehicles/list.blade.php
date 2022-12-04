<tr>
    <td>{{ $record->name }}</td>
    <td>{{ $record->email }}</td>
    <td>{{ $record->phone }}</td>
    <td>{{ $record->address}}</td>
    <td>{{ $record->zipcode}}</td>
    <td class="text-center">
        @if ($record->logotipo)
            <img src="{{Storage::url($record->logotipo)}}" class="avatar-sm" alt="image">
        @endif
    </td>
    <td class="text-center">
        <img src="{{ $record->active ? asset('images/acertado.png') : asset('images/fallado.png')}}"
            alt="{{ $record->active ? __('Yes') : __('No') }}"
            height="24px"
            width="24px"
            class="rounded-circle"
        >
    </td>
    @include('common.crud_actions')
</tr>
