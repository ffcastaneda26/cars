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
                                        wire:model="round_selected"
                                        name='brjornada'
                                        id='brjornada'
                                        value="{{$round->id}}"
                                        wire:click='select_games'
                                >
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- Juegos de la jornada seleccionada --}}
    <div class="container">
        <div class="card">
            <header class="card-header">Juegos de la jornada:  {{ $round_selected}}</header>
        </div>
    </div>
</div>


