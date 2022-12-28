<?php

namespace App\Http\Livewire;

use Livewire\Component;

class VehicleCard extends Component
{
    public $vehicle;
    public $show_more   = false;

    public function render()
    {

        return view('livewire.search.vehicle-card.vehicle-card');

    }
}
