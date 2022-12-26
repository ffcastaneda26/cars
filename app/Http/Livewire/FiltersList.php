<?php

namespace App\Http\Livewire;

use App\Models\Color;
use Livewire\Component;
use App\Traits\VehicleTrait;

class FiltersList extends Component
{
    use VehicleTrait;


    public function mount(){
        $this->min_max_miles();
        $this->miles_from   = $this->miles_min;
        $this->miles_to     = $this->miles_max;
      }


    public function render()
    {
        if($this->miles_from > $this->miles_to){
            $this->miles_to = $this->miles_from;
        }

        $this->yearsList      =  $this->fill_model_year_combo('model_year');
        $this->makesList      =  $this->fill_combos('make');
        $this->modelsList     =  $this->fill_combos('model');
        $this->bodiesList     =  $this->fill_combos('body');

        // TODO:: Lista de colores considerar los demas filtros
        $this->colors = Color::Select('id','english as color')
                ->wherehas('vehicles_exterior')
                ->get();


        return view('livewire.search.filters-list');
    }

    public function sendFiltersList($type,$value)
    {
        $this->reset_values($type);

        $this->emit('readFiltersList',$type,$value);
    }




}
