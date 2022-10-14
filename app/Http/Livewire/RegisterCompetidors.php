<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RegisterCompetidors extends Component
{
    public $message_code  = null;
    public $can_continue = false;
    public $read_competidor_data = null;
    public $read_picks = null;

    public function render()
    {
        return view('livewire.register-competidors');
    }
}
