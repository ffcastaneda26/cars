<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PadreController extends Component
{

    protected $listeners = ['leer_hijo','leer_hijo2'];

    public $hijo;
    public $hijo2;
    public function render()
    {
        return view('livewire.padre-controller');
    }


    public function enviar_a_contenedor(){
        $this->emitUp('leer_hijos',$this->hijo,$this->hijo2);
    }

    public function leer_hijo($valor)
    {
        $this->hijo=$valor;
    }

    public function leer_hijo2($valor)
    {
        $this->hijo2=$valor;
    }
}
