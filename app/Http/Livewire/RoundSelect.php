<?php

namespace App\Http\Livewire;

use App\Models\Round;
use Livewire\Component;

use function PHPUnit\Framework\isNull;

class RoundSelect extends Component
{
    public $rounds;
    public $round_selected;

    public function mount(){
        $this->rounds = Round::orderby('date_from')->get();

        foreach($this->rounds as $round){
           if(now()->startOfDay() <= $round->date_to){
                $this->round_selected = $round->id;
                break;
            }
        }
    }

    public function render()
    {
        return view('livewire.round-select');
    }

    public function select_games(){
        //dd('Se seleccionó la jornada' . $this->round_selected);
    }
}
