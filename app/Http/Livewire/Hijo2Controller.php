<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Hijo2Controller extends Component
{

    public $valor;
    public function render()
    {
        return view('livewire.hijo2-controller');
    }

    public function enviar_a_padre(){

        $this->emit('leer_hijo2',$this->valor);

    }

    public function enviar_a_contenedor(){
        $this->emit('leer_hijo2',$this->valor);
    }
}
