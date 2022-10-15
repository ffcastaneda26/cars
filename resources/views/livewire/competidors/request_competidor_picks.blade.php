<div>
        <p><h2 class="text-center">{{$first_name . ' ' . $last_name}}</h2></p>
        <p><h3 class="text-center"> {{__('Code') .': '. $code}}</h3></p>
        @if($error_message)
            <p><h3 class="text-center bg-danger">{{$error_message}}</h3></p>
        @endif
        <table class="table table-hover mb-0">
            <thead>
                <tr class="bg-dark text-white">
                    <th>@lang("Date")</th>
                    <th>@lang("Local")</th>
                    <th>@lang("Image")</th>
                    <th>@lang("L")</th>
                    @if(App::isLocale('en'))
                        <th>@lang("T")</th>
                    @else
                        <th>@lang("E")</th>
                    @endif
                    <th>@lang("V")</th>
                    <th>@lang("Visit")</th>
                    <th>@lang("Image")</th>
                </tr>
            </thead>

            {{-- Formulario --}}
   
                @foreach ($games as $game )
                    <tr>
                        <td>
                            @if(App::isLocale('en'))
                                {{ date('M d', strtotime($game->date)) }}
                            @else
                                {{ date('d M', strtotime($game->date)) }}
                            @endif
                        </td>
                        <td class="text-left">
                            {{$game->LocalTeam->name}}
                        </td>
                        <td>
                            <img  class="avatar-sm rounded-circle" src="{{url('storage/'.$game->LocalTeam->logotipo)}}" alt="{{$game->LocalTeam->name}}">
                        </td>
                        @if($game->LocalTeam->request_score || $game->VisitTeam->request_score || $game->request_score)
                            <td>
                                <input type="number"
                                    wire:model="local_scores.{{ $game->id }}"
                                    min="0"
                                    max="99"
                                    required
                                >
                            </td>
                            <td></td>
                            <td>
                                <input type="number"
                                    wire:model="visit_scores.{{ $game->id }}"
                                    min="0"
                                    max="99"
                                    required
                                >
                        @else
                            <td><input required class="form-check-input" type="radio" wire:model="winners.{{ $game->id }}" value="1" name="winners-{{$game->id}}"></td>
                            <td><input required class="form-check-input" type="radio" wire:model="winners.{{ $game->id }}" value="0" name="winners-{{$game->id}}"></td>
                            <td><input required class="form-check-input" type="radio" wire:model="winners.{{ $game->id }}" value="2" name="winners-{{$game->id}}"></td>
                        @endif
                            <td>
                                <span class="text-left"> {{$game->VisitTeam->name}}</span>
                            </td>
                            <td class="text-left">
                                <img  class="avatar-sm rounded-circle" src="{{url('storage/'.$game->VisitTeam->logotipo)}}" alt="{{$game->VisitTeam->name}}">
                            </td>

                    </tr>
                @endforeach

                <div class="float-end">
                    @if($confirm_register_competidor)
                        <button onclick="confirm_register_competidor()"
                            class="btn btn-success">
                            {{ __('Confirm your Picks')}}
                        </button>
                    @else
                        <button onclick="confirm_register_competidor()"
                            class="btn btn-primary">
                            {{ __('Save your Picks')}}
                        </button>
                    @endif

    
                </div>

        </table>
    
</div>