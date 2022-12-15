<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\UserTrait;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\CrudTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SearchController extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use UserTrait;


    public function mount()
    {
        $this->manage_title     = __('Search') . ' ' . __('Vehicles');
        $this->search_label     = __('Make,Model,Year....');

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

