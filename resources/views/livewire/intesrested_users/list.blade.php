<tr>
    <td>{{ $record->name }}</td>
    <td>{{ $record->email }}</td>
    <td>{{ $record->phone }}</td>
    <td> {{ $record->first_interested_vehicle()->interested->created_at->diffForHumans()}} </td>

    <td>
        {{
            App::isLocale('en') ? $record->first_interested_vehicle()->interested->status->english
                            : $record->first_interested_vehicle()->interested->status->spanish;
        }}

    </td>
    <td>
        <button type="button"
            wire:click="edit({{ $record->id }})"
            class="btn btn-success waves-effect"
            data-target="sample-modal"
            title="{{__("Edit")}}">
            <i class="mdi mdi-eye-circle"></i>
        </button>

    </td>
</tr>
