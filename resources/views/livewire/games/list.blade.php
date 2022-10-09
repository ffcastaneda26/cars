<tr>
    <td>
        @if(App::isLocale('en'))
            {{ date('M d Y', strtotime($record->date)) .' '. date('g:i a', strtotime($record->date))}}
        @else
            {{ date('d M Y', strtotime($record->date)) .' '. date('g:i a', strtotime($record->date))}}
        @endif
    </td>
    <td class="text-left">{{$record->LocalTeam->name}}</td>
    <td class="text-left">{{$record->VisitTeam->name}}</td>
    @include('common.crud_actions')
</tr>

