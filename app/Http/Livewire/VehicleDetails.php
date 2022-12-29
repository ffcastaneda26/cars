<?php

namespace App\Http\Livewire;

use App\Models\Vehicle;
use Livewire\Component;

class VehicleDetails extends Component
{

    protected $listeners = ['redirect_to_search'];
    public $show_details = false;
    public $vehicle;


    public function mount(Vehicle $vehicle)
    {
        $this->vehicle = $vehicle;
    }

    public function render()
    {
        return view('livewire.search.vehicle-details.vehicle-details')->layout('layouts.search_template');;
    }

    public function redirect_to_search(){
        $this->dispatchBrowserEvent('redirect_to_search');
    }
}
