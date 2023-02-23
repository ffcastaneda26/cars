<?php

/*+-------------------------------------------------------------------------+
  |                     VARIABLES COMPARTIDAS                               |
  +-------------------------------------------------------------------------+
  | Fecha       | Author  | Descripción                                     |
  +-------------+---------+-------------------------------------------------+
  | 23-feb-23   | FCO     | Creación                                        |
  +-------------+---------+-------------------------------------------------+
 */
namespace App\Traits;


trait VariablesTrait {
    public $make_id;
    public $model_id;
    public $style_id;

    public $model_year;
    public $makesList   = null;
    public $modelsList  = null;
    public $stylesList  = null;

    // Buscar vehiculos
    public $search_make_id = null;
    public $search_model_id = null;
    public $search_style_id = null;



    public $filters_list = null;
    public $filters_text = null;

}
