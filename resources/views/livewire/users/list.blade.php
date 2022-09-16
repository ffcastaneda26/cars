<tr>
    <td>{{ $record->name }}</td>
    <td>{{ $record->email }}</td>
    <td class="border px-2 py-1 leading-relaxed lg:text-sm xl:text-base text-gray-600">
        @if ($record->profile_photo_path)
            <img width="32" height="32" class="rounded-circle object-cover" src="{{Storage::url($record->profile_photo_path)}}" alt="photo" />
        @else
            <img width="32" height="32" class="rounded-circle object-cover" src="{{ asset('image/icons8-customer-30.png') }}" alt="photo" />
        @endif
    </td>
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
    {{-- <td class="text-center">
        <button type="button"
            wire:click="edit({{ $record->id }})"
            class="btn btn-success waves-effect"
            data-target="sample-modal"
            title="{{__("Edit")}}">
            <i class="mdi mdi-eye-circle"></i>
        </button>
    </td> --}}
    @include('common.crud_actions')

</tr>
