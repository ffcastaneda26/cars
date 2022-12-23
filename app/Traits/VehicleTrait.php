<?php

/*+-------------------------------------------------------------------------+
  |                     VEHICULO EN LO GENERAL                              |
  +-------------------------------------------------------------------------+
  | Fecha       | Author  | Descripción                                     |
  +-------------+---------+-------------------------------------------------+
  | 20-dic-22   | FCO     | Creación                                        |
  | 22-dic-22   | FCO     | Llenar un solo atributo e inicializar valores   |
  +-------------+---------+-------------------------------------------------+
 */
namespace App\Traits;

use App\Models\Vehicle;
use Illuminate\Support\Facades\DB;

trait VehicleTrait {

    public $colors;
    public $miles_from;
    public $miles_to;
    public $model_year;

    public $make        = null;
    public $model       = null;
    public $body        = null;
    public $color_id    = null;

    public $makesList   = null;
    public $modelsList  =  null;
    public $bodiesList  =  null;
    public $yearsList   =  null;

    public $filters_list = null;
    public $filters_text = null;


    // Llena combos recibiendo el atributo o campo
    public function fill_combos($attribute){
        return Vehicle::select($attribute, DB::raw( 'count(*) as total'))
                            ->whereNotNull($attribute)
                            ->whereBetween('miles', [$this->miles_from,$this->miles_to])
                            ->ModelYear($this->model_year)
                            ->Brand($this->make)
                            ->Model($this->model)
                            ->Body($this->body)
                            ->groupBy($attribute)
                            ->get();
    }

    // Combo exclusivamente de un atributo sin condicionar a otros valores
    public function fill_model_year_combo($attribute){
        return Vehicle::select($attribute, DB::raw( 'count(*) as total'))
                ->whereNotNull($attribute)
                ->groupBy($attribute)
                ->get();
    }

    // Inicializa valores según el valor que se indique (cascada)
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


}
