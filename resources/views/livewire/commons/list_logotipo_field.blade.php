<td class="text-center">
    @if($record->logotipo)
        <img  class="avatar-sm rounded-circle" src="{{url('storage/'.$record->logotipo)}}" alt="{{__('Image')}}">
    @endif
</td>
