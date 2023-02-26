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
                $this->reset('make_id','model_id');
                break;
            case 'make':
                $this->reset('make_id','model_id');
                break;
            case 'model':
        }
    }



}
