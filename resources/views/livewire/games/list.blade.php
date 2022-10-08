<tr>
    <td>{{ date('l F d Y', strtotime($record->date)) }}</td>
    <td>{{str_pad($record->hour,2,"0",STR_PAD_LEFT) . ':' . str_pad($record->minute,2,"0",STR_PAD_LEFT)}} </td>
    <td class="text-center">{{$record->LocalTeam->name}}</td>
    <td class="text-center">{{$record->VisitTeam->name}}</td>
    @include('common.crud_actions')
</tr>

