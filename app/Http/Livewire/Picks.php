<?php

namespace App\Http\Livewire;

use App\Models\Game;
use App\Models\Pick;
use Livewire\Component;
use App\Models\Competidor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

class Picks extends Component
{
    public $games       = null;
    public $winners     = [];
    public $local_scores= [];
    public $visit_scores= [];
    public $picks_saved = false;
    public $competidor  = null;
    public $view_show   = null;
    public $route       = null;

    public function mount(Request $request,Competidor $competidor)
    {
        $this->route = $request->fullUrl();
        $this->competidor = $competidor;
        if($this->competidor->picks->count()){
            $this->view_show = 'livewire.picks.show_picks';
        }else{
            $this->view_show = 'livewire.picks.create_picks';
        }
        $this->games = Game::orderby('date')->get();
    }



    public function render()
    {
        
        if($this->competidor->picks->count()){
            return view('livewire.picks.index',['records' => $this->competidor->picks()->orderby('game_id')->get() ]);
        }

       return view('livewire.picks.index');
    }

    /*+-------------------------+
      | Guarda los pronósticos  |
      +-------------------------+
      | Valida que estén todos  |
      +-------------------------+
    */
    public function store()
    {

        /** Pronósticos sin Marcador */
        foreach ($this->winners as $game => $pronostico){
            $this->create_pick($this->competidor->id,$game,$pronostico);
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

            $this->create_pick($this->competidor->id,$game,$pronostico,$local_score,$this->visit_scores[$game]);

        }

        Redirect::away('/picks/' . $this->competidor->id);
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
