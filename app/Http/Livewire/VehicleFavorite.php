<?php

namespace App\Http\Livewire;

use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class VehicleFavorite extends Component
{
    public $vehicle;

    public function mount(Vehicle $vehicle){
        $this->vehicle = $vehicle;
    }

    public function render()
    {

        return view('livewire.search.vehicle-favorite');
    }

    public function add_to_my_favorites(){
        if (Auth::check()) {
            if($this->vehicle->hasUser()){
                $this->vehicle->interested()->detach(Auth::user()->id);

            }else{
                $this->vehicle->interested()->attach(Auth::user()->id);
            }
        }
        $this->vehicle = Vehicle::findOrFail($this->vehicle->id);
        $this->emit('total_my_favorites');

    }



}
