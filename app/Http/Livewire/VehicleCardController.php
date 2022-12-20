<?php

namespace App\Http\Livewire;

use Livewire\Component;

class VehicleCardController extends Component
{
    public $vehicle;

    public function render()
    {

        return view('livewire.search.vehicle-card-controller');

    }
}
