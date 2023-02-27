<?php

namespace App\Http\Livewire;

use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class VehicleFavorite extends Component
{
    public $vehicle;
    public $total_favorites_before = null;

    public function mount(Vehicle $vehicle){
        $this->vehicle = $vehicle;
        $this->total_favorites_before = Auth::check() ? Auth::user()->total_favorites() : null;
    }

    public function render()
    {
        return view('livewire.search.vehicle-favorite');
    }

    // Agrega o quita de favoritos
    public function add_to_my_favorites(){
        
        if (Auth::check()) {
            $this->vehicle->hasUser() ? $this->vehicle->user_favorites()->detach(Auth::user()->id)
                                      : $this->vehicle->user_favorites()->attach(Auth::user()->id,['type'=>'favorite','status_id' => null,'user_updated_id'=> null]);
        }

        $this->vehicle = Vehicle::findOrFail($this->vehicle->id);

        if(!$this->total_favorites_before){
            $this->dispatchBrowserEvent('refresh_page');
        }

        $this->emit('total_my_favorites');

    }

}
