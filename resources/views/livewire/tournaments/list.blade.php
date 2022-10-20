<tr>

    <td>
        @if(App::isLocale('en'))
            {{ $record->Sport->english}}
        @else
            {{ $record->Sport->spanish}}
        @endif
    </td>

    <td>{{ $record->name }}</td>

    <td class="text-center">
        @if($record->allow_ties)
            <label>  {{__('Yes')}}</label>
        @else
            <label class="text-danger">{{__('No')}}</label>
        @endif
    </td>

    <td class="text-center">
        @if($record->require_all_picks)
            <label>  {{__('Yes')}}</label>
        @else
            <label class="text-danger">{{__('No')}}</label>
        @endif
    </td>

    <td>{{ $record->minutes_before_to_edit }}</td>

    <td class="text-center">
        @if($record->available_user_at_register)
            <label>  {{__('Yes')}}</label>
        @else
            <label class="text-danger">{{__('No')}}</label>
        @endif
    </td>

    <td class="text-center">
        @if($record->create_picks_at_available)
            <label>  {{__('Yes')}}</label>
        @else
            <label class="text-danger">{{__('No')}}</label>
        @endif
    </td>


    <td class="text-center">
        @if($record->logotipo)
            <img  class="avatar-sm rounded-circle" src="{{url('storage/'.$record->logotipo)}}" alt="{{__('Image')}}">
        @endif
    </td>
    @include('livewire.commons.list_active_field')


    @include('common.crud_actions')
</tr>

