<?php


/*+-------------------------------------------------------------------------------------------------+
  |                             VEHICULO EN LO GENERAL                                              |
  +-------------------------------------------------------------------------------------------------|
  | Fecha       | Author  | Descripción                                                             |
  +-------------+---------+-------------------------------------------------------------------------+
  | 20-dic-22   | FCO     | Creación                                                                |
  +-------------+---------+-------------------------------------------------------------------------+
 */
namespace App\Traits;

use Illuminate\Support\Facades\DB;

trait VehicleTrait {

    public $colors;
    public $miles_from;
    public $miles_to;
    public $make;
    public $makesList      = null;
    public $modelsList     =  null;
    public $bodiesList     =  null;
    public $yearsList      =  null;



    // Llena combos recibiendo el atributo o campo
    public function fill_combos($attribute){
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
    }

    /*
     * create_conditions_to_search
     *
     * @return
     * Crea condiciones para filtrar la búsqueda
     */

    public function create_conditions_to_search(){

    }


}
