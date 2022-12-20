<?php

namespace App\Http\Livewire;

use App\Models\Color;
use App\Models\Vehicle;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

class FiltersListController extends Component
{

    public $colors;
    public $miles_from;
    public $miles_to;
    public $make;
    public $makesList      = null;
    public $modelsList     =  null;
    public $bodiesList     =  null;
    public $yearsList      =  null;


    public function mount(){
        $this->miles_from   = 5000;
        $this->miles_to     = 5000;
        $this->colors = Color::Select('id','english as color')->wherehas('vehicles_exterior')->get();
        $this->modelsList     =  $this->fill_combos('model');
      }


    public function render()
    {

       if($this->miles_from > $this->miles_to){
            $this->miles_to = $this->miles_from;
        }

        if($this->make){
            $this->modelsList =  $this->fill_models_by_make();
        }

        $this->makesList      =  $this->fill_combos('make');
        $this->bodiesList     =  $this->fill_combos('body');
        $this->yearsList      =  $this->fill_combos('model_year');
        return view('livewire.search.filters-list-controller');
    }

    public function sendFiltersList($type,$value){
        $this->emit('readFiltersList',$type,$value);
    }



    // Llena combos recibiendo el atributo o campo
    private function fill_combos($attribute){
        return DB::table('vehicles')->select($attribute, DB::raw( 'count(*) as total'))
                                ->groupBy($attribute)
                                ->whereNotNull($attribute)
                                ->get()
                                ->toArray();

    }


    public function fill_models_by_make(){
        if(!$this->make) return;
        $this->sendFiltersList('make',$this->make);

        return DB::table('vehicles')->select('model', DB::raw( 'count(*) as total'))
                            ->groupBy('model')
                            ->where('make',$this->make)
                            ->whereNotNull('model')
                            ->get()
                            ->toArray();


       // dd('Marcas: ' , $this->makesList,'Modelos=' , $this->modelsList,'Marca seleccionada = ' . $this->make);

    }
}
