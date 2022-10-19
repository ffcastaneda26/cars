<div>
    <div class="card">
        <div class="card-body">
            <div class="container">
                <div class="col-sm-6 mx-auto">
                    <div class="row text-center">
                        <div class="col-sm">{{__('Select Round')}}</div>
                    </div>

                    {{-- Números de Rondas --}}
                    <div class="row justify-content-center">
                        @foreach($rounds as $round)
                            <div class="col-sm">{{$round->id}} </div>
                        @endforeach
                    </div>

                    {{-- Botones de Radio --}}
                    <div class="row">
                        @foreach($rounds as $round)
                            <div class="col-sm">
                                <input type='radio'
                                        wire:model="select_round"
                                        name='brjornada'
                                        id='brjornada'
                                        value="{{$round->id}}"
                                        wire:click='select_games'
                                        @if($round->id == 1) checked @endif
                                >
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


