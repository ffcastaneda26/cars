<tr>
    @if(App::isLocale('en'))
        <td>{{ $record->promotion->english }}</td>
        <td>{{ $record->english }}</td>
    @else
        <td>{{ $record->promotion->spanish }}</td>
        <td>{{ $record->spanish }}</td>
    @endif
    <td class="text-center">
        @if($record->active)
            <label>  {{__('Yes')}}</label>
        @else
            <label class="text-danger">{{__('No')}}</label>
        @endif
    </td>
    <td>
        @if($record->files()->count())
            <img class="mt-4 avatar-sm"
                src="{{ asset($record->files->first->file_path) }}" alt="Image"
            >
        @endif
    </td>
    @include('common.crud_actions')
</tr>

