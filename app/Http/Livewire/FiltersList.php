<?php

namespace App\Http\Livewire;

use App\Models\Make;
use App\Models\Color;
use Livewire\Component;
use App\Traits\VehicleTrait;
use App\Traits\VariablesTrait;

class FiltersList extends Component
{
    use VehicleTrait;
    use VariablesTrait;




    public function render()
    {

        $this->yearsList      =  $this->fill_model_year_combo('model_year');
        $this->makesList      =  Make::all();
        $this->modelsList     =  $this->fill_combos('model');
        $this->bodiesList     =  $this->fill_combos('body');


        return view('livewire.search.filters-list');
    }

    public function sendFiltersList($type,$value)
    {
        $this->reset_values($type);
        $this->emit('readFiltersList',$type,$value);
        $this->emit('redirect_to_search');


    }




}
