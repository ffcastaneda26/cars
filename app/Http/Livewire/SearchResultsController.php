<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SearchResultsController extends Component
{

    protected $listeners = ['readFiltersList','readFilterText'];

    public $filters_list = null;
    public $filters_text = null;

    public function render()
    {

        return view('livewire.search.search-results-controller');

    }


    public function readFiltersList($type,$value){
        $this->filters_list = "Recibimos desde Filtros de Lista Tipo=" .  $type . ' Valor=' . $value;
    }

    public function readFilterText($value){
        $this->filters_text = $value;
    }
}
