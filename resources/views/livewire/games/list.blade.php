<tr>
    <td>
        @if(App::isLocale('en'))
            {{ date('M d Y', strtotime($record->date)) .' '. date('g:i a', strtotime($record->date))}}
        @else
            {{ date('d M Y', strtotime($record->date)) .' '. date('g:i a', strtotime($record->date))}}
        @endif
    </td>
    <td class="text-left">{{$record->LocalTeam->name}}</td>
    
    <td>
        <img width="32px" height="32px" src="{{asset('/images/'. $record->LocalTeam->name . '.jfif')}}" alt=""></td>
        <td><img width="32px" height="32px" src="{{asset('/images/'. $record->VisitTeam->name . '.jfif')}}" alt=""></td>

    <td class="text-left">{{$record->VisitTeam->name}}</td>
   

    <td class="text-center">
        @if($record->request_score)
            <label>  {{__('Yes')}}</label>
        @else
            <label class="text-danger">{{__('No')}}</label>
        @endif
    </td>
    @include('common.crud_actions')
</tr>

