<?php

namespace App\Http\Livewire;

use App\Models\Vehicle;
use Livewire\Component;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class AddContactUser extends Component
{
    public $vehicle;
    public $total_favorites_before = null;
    public $enable_button_contact = true;
    public $button_contact_label;

    public function mount(Vehicle $vehicle){

        $this->vehicle = $vehicle;
        
        if (Auth::check()){
            $this->enable_button_contact= !$this->vehicle->isInterested();
        }

        if($this->enable_button_contact){
            $this->button_contact_label = 'Contact';
        }else{
            if($this->vehicle->isInterested()->interested->status_id == 1 ){
                $this->button_contact_label = 'The dealer will contact you';
            }else{
                $this->button_contact_label = App::isLocale('en') ? $this->vehicle->isInterested()->interested->status->english     
                                                                  : $this->vehicle->isInterested()->interested->status->spanish;
            }

        }

    }

    public function render()
    {
        return view('livewire.search.add-contact-user');

    }

    // Agrega como interesado a contactar
    public function add_contact_user(){
        if (Auth::check()) {
            $this->vehicle->interested_users()->attach(Auth::user()->id,['type' => 'contact','status_id' => 1]);
        }
        $this->vehicle = Vehicle::findOrFail($this->vehicle->id);
        $this->dispatchBrowserEvent('refresh_page');
    }


}
