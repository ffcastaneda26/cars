<tr class="h5">
    <td>{{ $record->spanish }}</td>
    <td>{{ $record->english }}</td>
    <td class="text-center">
        @if($record->image_path)
            <img class="rounded" width="50px" height="50px" src="{{asset('storage/languages/' . $record->image_path)}}" alt="{{__('Image')}}">
        @endif
    </td>
    <td>{{ $record->code }}</td>
    @include('common.crud_actions')
</tr>

