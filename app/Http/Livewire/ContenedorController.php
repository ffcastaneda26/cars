<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ContenedorController extends Component
{
    protected $listeners = ['leer_hijos'];

    public $hijo="Nombre Hijo 1";
    public $hijo2= "Nombre Hijo 2";

    public function render()
    {
        return view('livewire.contenedor-controller');
    }

    public function leer_hijos($hijo,$hijo2){

        $this->hijo=$hijo;
        $this->hijo2=$hijo2;
        $this->refresh();

        // dd('Leyó hijos:',"Hijo 1=" . $this->hijo . ' Hijo 2=' . $this->hijo2);
    }

    public function leer_hijo_contenedor($valor)
    {
        $this->hijo=$valor;
        dd('Leyó ' . $this->hijo=$valor);

    }

    public function leer_hijo2_contenedor($valor)
    {

        $this->hijo2=$valor;
        dd( $this->hijo2);
    }
}
