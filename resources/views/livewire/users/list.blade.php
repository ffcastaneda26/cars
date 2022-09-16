<tr>
    <td>{{ $record->name }}</td>
    <td>{{ $record->email }}</td>
    <td>
        @foreach($record->roles as $role)
            @if(App::isLocale('en'))
                {{ $role->english}}
            @else
                {{ $role->spanish}}
            @endif
        @endforeach
    </td>
    <td class="text-center">

        @if($record->active)
            <label>  {{__('Yes')}}</label>
        @else
            <label class="text-danger">{{__('No')}}</label>

        @endif


    </td>
    <td colspan="2" class="px-1 text-center">
        <button type="button"
            wire:click="edit({{ $record->id }})"
            class="btn btn-success waves-effect"
            data-target="sample-modal"
            title="{{__("Edit")}}">
            <i class="mdi mdi-eye-circle"></i>
        </button>
    </td>
</tr>
