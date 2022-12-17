<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FiltersListController extends Component
{

    public $make;

    public function mount(){
        $this->makes=
    }

    public function render()
    {
        return view('livewire.search.filters-list-controller');
    }

    public function sendFiltersList($type,$value){

        $this->emit('readFiltersList',$type,$value);

    }

    private function fill_combos()
    {
        
    }

}
