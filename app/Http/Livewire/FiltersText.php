<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\UserTrait;

class FiltersText extends Component
{

    use UserTrait;
    public $search;

    public function mount()
    {
        $this->search_label     = __('Make,Model,Year....');
    }


    public function render()
    {
        return view('livewire.search.filters-text');
    }


    public function sendFilters(){

        $this->emit('readFilterText',$this->search);

    }



}
