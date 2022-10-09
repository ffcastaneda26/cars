<div>
    @if ($picks_saved)
        <div class="text-center">
            <h1>SUS PRONOSTICOS HAN SIDO GUARDADOS</h1>
        </div>
    @endif

    <table class="table table-hover mb-0">
        <thead>
            <tr class="bg-dark text-white text-center">
                <th>@lang("Date")</th>
                <th>@lang("Local Team")</th>
                <th>@lang("Local")</th>
                <th>@lang("Tie")</th>
                <th>@lang("Visit")</th>
                <th>@lang("Visit Team")</th>

            </tr>
        </thead>

        {{-- Formulario --}}
        <form wire:submit.prevent="store">
            @foreach ($games as $game )
                <tr>
                    <td>
                        @if(App::isLocale('en'))
                            {{ date('M d Y', strtotime($game->date)) .' '. date('g:i a', strtotime($game->date))}}
                        @else
                            {{ date('d M Y', strtotime($game->date)) .' '. date('g:i a', strtotime($game->date))}}
                        @endif
                    </td>
                    <td class="text-left">
                        <img width="32px" height="32px" src="{{asset('/images/'. $game->LocalTeam->name . '.jfif')}}" alt="">
                        {{-- <img class="avatar-sm" src="{{url('storage/'.$game->LocalTeam->logotipo)}}" alt="{{ $game->LocalTeam->short}}"> --}}
                        
                        <span class="text-left">{{$game->LocalTeam->name}}</span>
                    </td>
                    @if($game->LocalTeam->request_score || $game->VisitTeam->request_score || $game->request_score)
                        <td align="center">
                            <input type="number" 
                                    wire:model="local_scores.{{ $game->id }}"
                                    min="0"
                                    max="9"
                                    required
                            >
                        </td>
                        <td></td>
                        <td align="center">
                            <input type="number" 
                                    wire:model="visit_scores.{{ $game->id }}"
                                    min="0"
                                    max="9"
                                    required
                            >

                    @else
                                    
                        <td  class="text-center"><input required class="form-check-input" type="radio" wire:model="winners.{{ $game->id }}" value="1" name="winners-{{$game->id}}"></td>
                        <td  class="text-center"><input required class="form-check-input" type="radio" wire:model="winners.{{ $game->id }}" value="0" name="winners-{{$game->id}}"></td>
                        <td  class="text-center"><input required class="form-check-input" type="radio" wire:model="winners.{{ $game->id }}" value="2" name="winners-{{$game->id}}"></td>
                    @endif
                        <td class="text-left">
                        <img width="32px" height="32px" src="{{asset('/images/'. $game->VisitTeam->name . '.jfif')}}" alt="">
                        <span class="text-left">
                            {{$game->VisitTeam->name}}
                        </span>
                    </td>   

                </tr>
            @endforeach

            @if(!$picks_saved)
                <div class="float-end">    
                    <button type="submit" class="btn btn-primary">
                        {{ __('Save your Picks')}}
                    </button>
                </div>
            @endif
        </form>
    </table>





</div>
