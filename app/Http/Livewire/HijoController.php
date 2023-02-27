<?php

namespace App\Http\Livewire;

use Livewire\Component;

class HijoController extends Component
{

    public $valor;
    public function render()
    {
        return view('livewire.hijo-controller');
    }


    public function enviar_a_padre(){
        $this->emit('leer_hijo',$this->valor);
    }


    public function enviar_a_contenedor(){
        $this->emit('leer_hijo_contenedor',$this->valor);
    }
}
