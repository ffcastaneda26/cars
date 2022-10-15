<div>
    <h3 class="text-center">{{ __('Total Hits') }} = {{ $competidor->Hits() }}</h3>
    <table class="table table-hover mb-0">
        <div style="position: fixed;">
            <thead>
                <tr class="bg-dark text-white text-center">
                    <th>@lang('Date')</th>
                    <th colspan="2">@lang('Local')</th>
                    <th>@lang('L')</th>
                    <th>@lang('T')</th>
                    <th>@lang('V')</th>
                    <th>@lang('Did you guess?')</th>
                    <th colspan="2">@lang('Visit')</th>
                </tr>
            </thead>
        </div>
        @foreach ($records as $record)

            <tr>
                {{-- Fecha Juego --}}
                <td>
                    @if (App::isLocale('en'))
                        {{ date('M d', strtotime($record->game->date)) }}
                    @else
                        {{ date('d M', strtotime($record->game->date)) }}
                    @endif
                </td>
          
                {{-- Local --}}
                <td class="text-left">
                    @if ($record->game->local_score > $record->game->visit_score)
                        <span class="text-left" style="background-color: greenyellow">
                        @elseif ($record->game->local_score < $record->game->visit_score)
                            <span class="text-left" style="background-color: rgb(255, 0, 0)">
                            @else
                                <span class="text-left">
                    @endif
                    <span class="text-left">{{ $record->game->LocalTeam->name }}</span>
                    <img width="24px" height="24px" class="avatar-sm rounded-circle"
                        src="{{ url('storage/' . $record->game->LocalTeam->logotipo) }}" alt="{{ $record->game->LocalTeam->name }}">
                </td>
              

                <td>
                    {{ $record->game->local_score }}
                </td>
              
              
                {{-- Tipo de control: Botón de radio o etiqueta --}}
                @if ($record->game->LocalTeam->request_score ||
                    $record->game->VisitTeam->request_score ||
                    $record->game->request_score)
                    <td align="center"><label>{{ $record->local_score }}</label></td>
                    <td></td>
                    <td align="center"><label>{{ $record->visit_score }}</label></td>
                @else
                    <td class="text-center">
                        <input type="radio" disabled class="form-check-input"
                            @if ($record->winner == 1) checked @endif>
                    </td>
                    <td class="text-center">
                        <input type="radio" disabled class="form-check-input"
                            @if ($record->winner == 0) checked @endif>
                    </td>

                    <td class="text-center">
                        <input type="radio" disabled class="form-check-input"
                            @if ($record->winner == 2) checked @endif>
                    </td>
                @endif

                {{-- ¿Acertó o falló? --}}
                <td class="text-center">
                    @if ($record->game->local_score || $record->game->visit_score)
                        @if ($record->winner == $record->game->result)
                            <img width="24px" height="24px" src="{{ asset('/images/success.jfif') }}"
                                alt="">
                        @else
                            <img width="24px" height="24px" src="{{ asset('/images/failed.jfif') }}" alt="">
                        @endif
                    @endif
                </td>
                <td>
                    {{ $record->game->visit_score }}
                </td>
                <td class="text-left">
                    {{ $record->game->VisitTeam->name }}
                    @if ($record->game->local_score < $record->game->visit_score)
                        <span class="text-left" style="background-color: greenyellow">
                    @elseif ($record->game->local_score > $record->game->visit_score)
                        <span class="text-left" style="background-color: rgb(255, 0, 0)">
                    @else
                        <span class="text-left">
                    @endif
                    <img class="avatar-sm rounded-circle"
                    src="{{ url('storage/' . $record->game->VisitTeam->logotipo) }}" alt="{{ $record->game->VisitTeam->name }}">
                    </span>
                </td>
            </tr>
        @endforeach
    </table>
</div>
