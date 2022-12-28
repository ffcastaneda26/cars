<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Livewire\Traits\CrudTrait;

class MainSearch extends Component
{
    use CrudTrait;

    public function mount()
    {
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

