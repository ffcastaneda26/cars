<?php

namespace App\Http\Livewire;

use App\Models\Vehicle;
use Livewire\Component;

class ShowVehiclesController extends Component
{

    protected $listeners = ['readFiltersList','readFilterText'];

    public $filters_list = null;
    public $filters_text = null;

    public $make='';
    public $model=null;
    public $body=null;
    public $color_id=null;
    public $model_year=null;
    public $miles_from = 1000;
    public $miles_to = 150000;



    public function render()
    {
        $vehicles = $this->searchVehicles();
        return view('livewire.search.show-vehicles-controller',compact('vehicles'));

    }


    public function readFiltersList($type,$value){

        switch ($type) {
            case 'make':
                $this->make = $value;
                break;
            case 'model':
                $this->model = $value;
                break;
            case 'body':
                $this->body = $value;
                break;
            case 'color_id':
                $this->color_id = $value;

            case 'model_year':
                $this->model_year = $value;
                break;
            case 'miles_from':
                $this->miles_from = $value;
                break;

            case 'miles_to':
                $this->miles_to = $value;
                break;

        }
        $this->filters_list = "Recibimos desde Filtros de Lista Tipo=" .  $type . ' Valor=' . $value;
    }

    public function readFilterText($value){

        $this->filters_text =  $value;

    }

    public function searchVehicles(){

        return Vehicle::Brand($this->make)
                        // ->model($this->model)
                         ->body($this->body)
                        // ->colorExterior($this->color_id)
                        // ->ModelYear($this->model_year)
                        // ->Miles($this->miles_from,$this->miles_to)
                        ->get();

    }
}
