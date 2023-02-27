<?php

namespace App\Http\Livewire;

use App\Models\Vehicle;
use Livewire\Component;
use App\Traits\VariablesTrait;
use Illuminate\Support\Facades\Auth;

class searchVehicles extends Component
{
    use VariablesTrait;

    protected $listeners = ['readFiltersList','readFilterText','search_only_favorites'];

    public $filters_list = null;
    public $filters_text = null;

    public function render()
    {
        $vehicles = $this->searchVehicles();
        return view('livewire.search.search-vehicles.search-vehicles',compact('vehicles'));
    }



    // Busca vehículos
    public function searchVehicles(){
        return Vehicle::ModelYear($this->model_year)
                        ->Brand($this->search_make_id)
                        ->Model($this->search_model_id)
                        ->Style($this->search_style_id)
                        ->get();
    }

    // Lee el filtro recibido
    public function readFiltersList($type,$value){
        // dd($type,$value);
        $value = $value == 'null' ? null : $value;

            switch ($type) {
                case 'model_year':
                    $this->model_year = $value;
                    break;
                case 'make':
                    $this->search_make_id = $value;
                    break;
                case 'model':
                    $this->search_model_id = $value;
                    break;
                case 'style':
                    $this->search_style_id = $value;
                    break;
            }

            $this->reset_values($type);
    }

    public function readFilterText($value){

        // TODO:Hay que extraer cada palabra y revisar si es marca,modelo, axo
        $this->filters_text =  $value;

    }
    // Inicializa valores
    public function reset_values($type){
        switch ($type) {
            case 'model_year':
                $this->reset('search_make_id','search_model_id');
                break;
            case 'make':
                if($this->search_make_id == 'null'){
                    $this->reset('search_make_id','search_model_id');
                }else{
                    $this->reset('search_model_id');
                }
                break;
            case 'model':
                if($this->search_make_id == 'null'){
                    $this->reset('search_model_id');
                }
                break;
            case 'style':
                if($this->search_make_id == 'null'){
                    $this->reset('search_style_id');
                }
                break;
        }
    }

}
