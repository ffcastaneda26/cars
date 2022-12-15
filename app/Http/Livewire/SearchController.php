<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Livewire\Traits\CrudTrait;

class SearchController extends Component
{
    use CrudTrait;

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
        return view('livewire.search.search-controller')->layout('layouts.search_template');
    }

}

