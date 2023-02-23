<?php

namespace App\Http\Livewire;

use App\Models\Make;
use App\Models\Style;
use App\Models\Modell;
use Livewire\Component;
use App\Traits\VehicleTrait;
use App\Traits\VariablesTrait;

class FiltersList extends Component
{
    use VehicleTrait;
    use VariablesTrait;

    public function mount(){

        $this->yearsList      =  $this->fill_model_year_combo('model_year');
        $this->makesList      =  Make::select('id','name')->orderby('name')->get();
        $this->modelsList     =  Modell::select('id','name')->orderby('name')->get();
        $this->stylesList     =  Style::orderby('name')->get();
    }

    public function render()
    {
        return view('livewire.search.filters-list');
    }

    // Lee la marca para poder  llenar lista de modelos
    public function read_make(){
        if($this->make_id && $this->make_id  != 'null'){
            $this->make = Make::findOrFail($this->make_id);
            $this->modelsList= $this->make->models()->select('id','name')->get();
        }else{
            $this->modelsList     =  Modell::select('id','name')->orderby('name')->get();
        }
    }

    // Envia el Filtro
    public function sendFiltersList($type,$value)
    {
        if($this->make_id){
            $this->read_make();
        }

        $this->emit('readFiltersList',$type,$value);
        $this->emit('redirect_to_search');

    }




}
