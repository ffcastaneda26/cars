<?php

namespace App\Http\Livewire;

use Livewire\Component;

class HijaController extends Component
{

    public $valor;
    public function render()
    {
        return view('livewire.hija-controller');
    }


    public function enviar_a_padre(){

        $this->emit('leer_hija',$this->valor);

    }
}
