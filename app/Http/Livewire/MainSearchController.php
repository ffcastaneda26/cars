<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Livewire\Traits\CrudTrait;

class MainSearchController extends Component
{
    use CrudTrait;

    public function mount()
    {
        $this->manage_title     = __('Search') . ' ' . __('Vehicles');
    }

    /*+-----------------+
      | Regresa Vista   |
      +-----------------+
    */

    public function render()
    {
        return view('livewire.search.main-search-controller')->layout('layouts.search_template');
    }

}

