<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Livewire\Traits\CrudTrait;

class SearchController extends Component
{
    use CrudTrait;

    protected $listeners = ['readFiltersList','readFilterText'];

    public $datos_recibidos = null;
    public $imprimir_en_vista;
    public function mount()
    {
        $this->manage_title     = __('Search') . ' ' . __('Vehicles');
    }

    /*+---------------------------------+
      | Regresa Vista con Resultados    |
      +---------------------------------+
    */

    public function render()
    {
        if($this->imprimir_en_vista){
            dd($this->imprimir_en_vista);
        }
        return view('livewire.search.search-controller')->layout('layouts.search_template');
    }

    public function readFiltersList($type,$value){
        $this->datos_recibidos = "Recibimos desde Filtros de Lista Tipo=" .  $type . ' Valor=' . $value;
    }

    public function readFilterText($value){
        $this->imprimir_en_vista = $value;
        // dd($value);
    }

}

