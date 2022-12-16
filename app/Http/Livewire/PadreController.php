<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PadreController extends Component
{

    protected $listeners = ['leer_hijo','leer_hija'];

    public $hijo;
    public $hija;
    public function render()
    {
        return view('livewire.padre-controller');
    }

    public function leer_hijo($valor)
    {
        $this->hijo=$valor;
    }

    public function leer_hija($valor)
    {
        $this->hija=$valor;
    }
}
