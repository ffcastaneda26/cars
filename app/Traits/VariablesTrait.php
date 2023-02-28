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
    public $dealer_id   = null;
    public $model_year  = null;
    public $make_id     = null;
    public $model_id    = null;
    public $style_id    = null;

    public $dealer      = null;
    public $make        = null;
    public $model      = null;
    public $style      = null;



    public $dealersList = null;
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
