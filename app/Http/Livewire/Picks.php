<?php

namespace App\Http\Livewire;

use App\Models\Competidor;
use App\Models\Game;
use App\Models\Pick;
use Livewire\Component;

class Picks extends Component
{
    public $games;
    public $winners = [];
    public $local_scores = [];
    public $visit_scores = [];
    public $picks_saved = false;

    
    public function mount()
    {
        $this->games = Game::orderby('date')->get();
    }
    public function render()
    {
        return view('livewire.picks');
    }

    /*+-------------------------+
      | Guarda los pronósticos  |
      +-------------------------+
      | Valida que estén todos  |
      +-------------------------+
    */
    public function store()
    {
        $competidor = Competidor::first();

        /** Pronósticos sin Marcador */
        foreach ($this->winners as $game => $pronostico){
            $this->create_pick($competidor->id,$game,$pronostico);
        }

        /** Pronosticos con Marcador */
        foreach ($this->local_scores as $game => $local_score){
            if( $local_score == $this->visit_scores[$game] ){
                $pronostico = 0;
            }

            if( $local_score > $this->visit_scores[$game] ){
                $pronostico = 1;
            }

            if( $local_score > $this->visit_scores[$game] ){
                $pronostico = 2;
            }

            $this->create_pick($competidor->id,$game,$pronostico,$local_score,$this->visit_scores[$game]);
          
        }
        $this->picks_saved = true;
      // dd('Partido:' . $local_score . ' Local=' . $marcador . ' Visita=' . $this->visit_scores[$local_score] );
      //  dd('Winners',$this->winners,'Local Scores',$this->local_scores,'Visit Scores',$this->visit_scores);
    }

    private function create_pick($competidor_id,$game_id,$winner,$local_store=0,$visit_score=0){
        Pick::create([
            'competidor_id' => $competidor_id,
            'game_id'       => $game_id,
            'winner'        => $winner,
            'local_score'   => $local_store,
            'visit_score'   => $visit_score
        ]);
    }

}
