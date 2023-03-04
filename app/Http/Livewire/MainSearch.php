<?php

namespace App\Http\Livewire;

use App\Models\Style;
use Livewire\Component;
use App\Http\Livewire\Traits\CrudTrait;

class MainSearch extends Component
{
    use CrudTrait;
    public $style_search = null;


    public function mount($style = null)
    {
        if($style){
            $this->style_search = $style;
        }

        $this->manage_title = null;
    }

    /*+-----------------+
      | Regresa Vista   |
      +-----------------+
    */


    public function render()
    {
        return view('livewire.search.main-search')->layout('layouts.search_template');
    }


}

