<div>
    <h3 class="text-center">{{ __('Total Hits')}} = {{$competidor->Hits()}}</h3>

        <table class="table table-hover mb-0">
            <div style="position: fixed;">
                <thead>
                    <tr class="bg-dark text-white text-center">
                        <th>@lang("Date")</th>
                        <th colspan="2">@lang("Local")</th>
                        <th>@lang("L")</th>
                        <th>@lang("T")</th>
                        <th>@lang("V")</th>
                        <th>@lang("Did you guess?")</th>
                        <th colspan="2">@lang("Visit")</th>
                    </tr>
                </thead>
            </div>


                @foreach ($records as $record )

                        <tr>
                            <td>
                                @if(App::isLocale('en'))
                                    {{ date('M d Y', strtotime($record->game->date)) }}
                                @else
                                    {{ date('d M Y', strtotime($record->game->date))    }}
                                @endif
                            </td>
                            <td class="text-left">
                                <img width="32px" height="32px" src="{{asset('/images/'. $record->Game->LocalTeam->name . '.jfif')}}" alt="">
                                {{-- <img class="avatar-sm" src="{{url('storage/'.$record->LocalTeam->logotipo)}}" alt="{{ $record->LocalTeam->short}}"> --}}
                                @if($record->Game->local_score > $record->Game->visit_score)
                                    <span class="text-left" style="background-color: greenyellow">
                            @elseif ($record->Game->local_score < $record->Game->visit_score)
                                <span class="text-left" style="background-color: rgb(255, 0, 0)">
                            @else
                                <span class="text-left">
                            @endif
                                <span class="text-left">{{$record->Game->LocalTeam->name}}</span>
                            </td>

                            <td>
                                {{ $record->game->local_score}}
                            </td>

                            {{-- Tipo de control: Botón de radio o etiqueta --}}
                            @if($record->Game->LocalTeam->request_score|| $record->Game->VisitTeam->request_score || $record->Game->request_score)
                                <td align="center"><label>{{$record->local_score}}</label></td>
                                <td></td>
                                <td align="center"><label>{{$record->visit_score}}</label></td>
                            @else
                                <td  class="text-center">
                                    <input type="radio"
                                            disabled
                                            class="form-check-input"
                                            @if($record->winner == 1) checked @endif

                                        >
                                </td>
                                <td  class="text-center">
                                    <input type="radio"
                                            disabled
                                            class="form-check-input"
                                            @if($record->winner == 0) checked @endif
                                        >
                                </td>

                                <td  class="text-center">
                                    <input type="radio"
                                            disabled
                                            class="form-check-input"
                                            @if($record->winner == 2) checked @endif
                                        >
                                </td>


                            @endif

                            {{-- ¿Acertó o falló? --}}
                            <td class="text-center">
                                @if($record->Game->local_score || $record->Game->visit_score)
                                    @if($record->winner == $record->Game->result)
                                        <img width="24px" height="24px" src="{{asset('/images/success.jfif')}}" alt="">
                                    @else
                                        <img width="24px" height="24px" src="{{asset('/images/failed.jfif')}}" alt="">
                                    @endif
                                @endif
                            </td>

                            <td>
                                {{ $record->game->visit_score}}
                            </td>
                            <td class="text-left">
                                <img width="32px" height="32px" src="{{asset('/images/'. $record->Game->VisitTeam->name . '.jfif')}}" alt="">
                                @if($record->Game->local_score < $record->Game->visit_score)
                                        <span class="text-left" style="background-color: greenyellow">
                                @elseif ($record->Game->local_score > $record->Game->visit_score)
                                        <span class="text-left" style="background-color: rgb(255, 0, 0)">
                                @else
                                        <span class="text-left">
                                @endif
                                    {{$record->Game->VisitTeam->name}}
                                </span>
                            </td>


                        </tr>
                @endforeach
        </table>
</div>
