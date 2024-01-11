<?php

namespace App\Http\Livewire;

use App\Models\Style;
use App\Models\Vehicle;
use Livewire\Component;
use App\Traits\VariablesTrait;

class searchVehicles extends Component
{
    use VariablesTrait;
    public $limitPerPage = 12;

    protected $listeners = ['readFiltersList','readRouteStyle','load-more' => 'loadMore'];


    public $filters_list = null;
    public $style_route = null;



    public function render()
    {
        if($this->style_route){
            $this->style_route = strtoupper($this->style_route);
            if( $this->style_route == 'PICKUP'){
                $this->style_route = 'PICK-UP';
            }

            $record_style = Style::where('name',$this->style_route)->first();
            if($record_style){
                $this->style_id = $record_style->id;
            }
        }

        $vehicles = $this->searchVehicles();
        return view('livewire.search.search-vehicles.search-vehicles',compact('vehicles'));
    }

    public function loadMore()
    {
        $this->limitPerPage = $this->limitPerPage + 12;
    }


    // Busca vehículos
    public function searchVehicles(){
        return Vehicle::ModelYear($this->model_year)
                    ->Brand($this->make_id)
                    ->Model($this->model_id)
                    ->StyleSearch($this->style_id)
                    ->orderby('model_year','desc')
                    ->paginate(10);
    }

    // Recibe los valores para el filtro
    public function readRouteStyle($style_id=null){
        $this->style_id = $style_id;
    }

    // Recibe los valores para el filtro
    public function readFiltersList($model_year=null,$make_id=null,$model_id=null,$style_id=null){
        $this->model_year = $model_year;
        $this->make_id = $make_id;
        $this->model_id = $model_id;
        $this->style_id = $style_id;
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
