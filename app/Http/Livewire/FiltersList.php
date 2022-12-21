<?php

namespace App\Http\Livewire;

use App\Models\Color;
use App\Traits\VehicleTrait;
use Livewire\Component;

class FiltersList extends Component
{
    use VehicleTrait;


    public function mount(){
        $this->miles_from   = 5000;
        $this->miles_to     = 150000;
        $this->modelsList     =  $this->fill_combos('model');
      }


    public function render()
    {

       if($this->miles_from > $this->miles_to){
            $this->miles_to = $this->miles_from;
        }

        if($this->make){
            $this->modelsList =  $this->fill_models_by_make();
        }else{
            $this->modelsList      =  $this->fill_combos('model');
        }

        $this->makesList      =  $this->fill_combos('make');
        $this->bodiesList     =  $this->fill_combos('body');
        $this->yearsList      =  $this->fill_combos('model_year');
        $this->colors = Color::Select('id','english as color')->wherehas('vehicles_exterior')->get();

        return view('livewire.search.filters-list');
    }

    public function sendFiltersList($type,$value){
        $this->emit('readFiltersList',$type,$value);
    }

}
