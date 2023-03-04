<?php

namespace App\Http\Livewire;

use App\Models\Style;
use App\Models\Vehicle;
use Livewire\Component;
use App\Traits\VariablesTrait;

class SearchsByStyles extends Component
{
    use VariablesTrait;

    public $styleRecord = null;
    public $vehicles;

    public function mount($style){
        if($style ){
            if($style == 'pickup'){
                $style = 'pick-up';
            }

            $this->styleRecord = Style::where('name',strtoupper($style))->first();
            $this->vehicles = Vehicle::where('style_id',$this->styleRecord->id)->get();
        }
    }


    public function render()
    {
        $vehicles = $this->vehicles;
        return view('livewire.search.main-search')->layout('layouts.search_template');

        return view('livewire.search.searchs-by-styles',compact('vehicles'))->layout('layouts.search_template');

        return view('livewire.search.search-vehicles.search-vehicles',compact('vehicles'))->layout('layouts.search_template');
    }

    // Busca vehículos
    public function searchVehicles(){
        dd($this->styleRecord->id);
        return Vehicle::where('style_id',$this->styleRecord->id)->get();
    }
}

