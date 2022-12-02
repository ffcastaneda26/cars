<tr>
    <td>{{ $record->name }}</td>
    <td>{{ $record->email }}</td>
    <td>
        @foreach($record->roles as $role)
        {{ App::isLocale('en') ? $role->english :  $role->spanish }}
    @endforeach
    </td>


    <td class="text-center">
        {{ $record->active ? __('Yes') : __('No') }}
    </td>
    @include('common.crud_actions')
</tr>
