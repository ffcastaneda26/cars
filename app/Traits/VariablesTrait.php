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


    //    Estilos
    public $yearsList   = null;
    public $dealersList = null;
    public $makesList   = null;
    public $modelsList  = null;
    public $stylesList  = null;

    // Buscar vehiculos
    public $search_model_year = null;
    public $search_make_id = null;
    public $search_model_id = null;
    public $search_style_id = null;
    public $stock_search    = null;

    public $yearsList_search = null;
    public $makesList_search = null;
    public $modelsList_search = null;
    public $stylesList_search = null;



    public $filters_list = null;
    public $filters_text = null;


}
