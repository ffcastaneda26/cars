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

    public function mount(){
        $this->colors = Color::Select('id','english as color')->wherehas('vehicles_exterior')->get();
    }


    public function render()
    {
        $makesList      =  $this->fill_combos('make');
        $modelsList     =  $this->fill_combos('model');
        $bodiesList     =  $this->fill_combos('body');
        $yearsList      =  $this->fill_combos('model_year');
        $this->colors   = Color::Select('id','english as color')->wherehas('vehicles_exterior')->get();

        return view('livewire.search.filters-list-controller',compact('makesList','modelsList','bodiesList','yearsList'));
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

}
