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


    public function render()
    {
        $this->yearsList      =  $this->fill_model_year_combo('model_year');
        $this->makesList      =  Make::select('id','name')
                                        ->wherehas('vehicles')
                                        ->orderby('name')
                                        ->withCount('vehicles')
                                        ->get();
        $this->stylesList     =  Style::orderby('name')
                                        ->wherehas('vehicles')
                                        ->orderby('name')
                                        ->withCount('vehicles')
                                        ->get();

        $this->read_make();
        return view('livewire.search.filters-list');
    }

    // Lee la marca para poder  llenar lista de modelos
    public function read_make(){
        if($this->make_id && $this->make_id  != 'null'){
            $this->modelsList=  Modell::select('id','name')
                                ->wherehas('vehicles')
                                ->MakeId($this->make_id)
                                ->withCount('vehicles')
                                ->get();
        }else{
            $this->modelsList     =  Modell::select('id','name')
                                            ->wherehas('vehicles')
                                            ->orderby('name')
                                            ->withCount('vehicles')
                                            ->get();
        }
    }

    // Envia el Filtro
    public function sendFiltersList($type,$value)
    {
        if($this->make_id){
            $this->read_make();
        }


        $this->emit('readFiltersList',$type,$value);
        $this->reset_values($type);
        $this->emit('redirect_to_search');

    }

    // Inicializa valores
    public function reset_values($type){
        switch ($type) {
            case 'model_year':
                $this->reset('make_id','model_id');
                break;
        }
    }



}
