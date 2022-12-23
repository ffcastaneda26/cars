<?php

namespace App\Http\Livewire;

use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class VehicleFavorite extends Component
{
    public $vehicle;
    public $total_favorites_before;

    public function mount(Vehicle $vehicle){
        $this->vehicle = $vehicle;
        $this->total_favorites_before = Auth::user()->favorites->count();
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

        if(!$this->total_favorites_before){
            $this->dispatchBrowserEvent('refresh_page');
        }

        $this->emit('total_my_favorites');

    }



}
