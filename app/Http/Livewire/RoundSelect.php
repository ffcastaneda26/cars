<?php

namespace App\Http\Livewire;

use App\Models\Round;
use Livewire\Component;

class RoundSelect extends Component
{

    public $rounds;
    public $select_round;

    public function mount(){
        $this->rounds = Round::orderby('date_from')->get();
    }

    public function render()
    {
        return view('livewire.round-select');
    }

    public function select_games(){
        dd('Se seleccionó la jornada' . $this->select_round);
    }
}
