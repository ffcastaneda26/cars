<tr>
    <td>{{ $record->name }}</td>
    <td>{{ $record->email }}</td>
    <td>
        @foreach($record->roles as $role)
        {{ App::isLocale('en') ? $role->english :  $role->spanish }}
    @endforeach
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
