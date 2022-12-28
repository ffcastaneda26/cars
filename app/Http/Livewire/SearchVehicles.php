<?php

namespace App\Http\Livewire;

use App\Models\Vehicle;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class SearchVehicles extends Component
{

    protected $listeners = ['readFiltersList','readFilterText','search_only_favorites'];

    public $filters_list = null;
    public $filters_text = null;
    public $show_only_favorites = false;

    public $model       = null;
    public $body        = null;
    public $color_id    = null;
    public $model_year  = null;
    public $make        = null;
    public $miles_from  = 100;
    public $miles_to    = 500000;

    public function render()
    {
        if(  $this->show_only_favorites ) {
            $vehicles = Auth::user()->favorites;
        }else{
            $vehicles = $this->searchVehicles();
        }

        return view('livewire.search.search-vehicles.search-vehicles',compact('vehicles'));
    }


    public function readFiltersList($type,$value){

        switch ($type) {
            case 'model_year':
                $this->model_year = $value;
                break;

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

            case 'miles_from':
                $this->miles_from = $value;
                break;

            case 'miles_to':
                $this->miles_to = $value;
                break;
        }

        $this->reset_values($type);
        $this->reset('show_only_favorites');
    }

    public function readFilterText($value){

        $this->filters_text =  $value;

    }

    // Busca vehículos
    public function searchVehicles(){
        return Vehicle::with(['location.dealer.package','location.dealer.tags','interested','photos'])
                    ->ModelYear($this->model_year)
                    ->Brand($this->make)
                    ->model($this->model)
                    ->body($this->body)
                    ->colorExterior($this->color_id)
                    ->Miles($this->miles_from,$this->miles_to)
                    ->get();

    }

    // Inicializa valores
    public function reset_values($type){
        switch ($type) {
            case 'model_year':
                $this->reset('make','model','body','color_id');
                break;
            case 'make':
                $this->reset('model','body','color_id');
                break;
            case 'model':
                $this->reset('body','color_id');
                break;
            case 'body':
                $this->reset('color_id');
                break;

        }
    }

    // Solo los favoritos
    public function search_only_favorites()
    {
        $this->reset('show_only_favorites');
        if(Auth::check()){
            $this->show_only_favorites = Auth::user()->total_favorites();
        }
    }
}
