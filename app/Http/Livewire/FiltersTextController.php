<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\UserTrait;

class FiltersTextController extends Component
{

    use UserTrait;
    public function mount()
    {
        $this->search_label     = __('Make,Model,Year....');
    }


    public function render()
    {
        return view('livewire.search.filters-text-controller');
    }


}
