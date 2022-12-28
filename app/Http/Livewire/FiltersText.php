<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FiltersText extends Component
{

    public $search;

    public function mount()
    {
        $this->search_label     = __('Make,Model,Year....');
    }


    public function render()
    {
        return view('livewire.search.filters-text.filters-text');
    }


    public function sendFilters(){

        $this->emit('readFilterText',$this->search);

    }



}
