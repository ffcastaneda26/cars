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
    public $model_year;
    public $makesList   = null;


    public $colors;
    public $miles_from;
    public $miles_to;


    public $make        = null;
    public $model       = null;
    public $body        = null;
    public $color_id    = null;

    public $modelsList  =  null;
    public $bodiesList  =  null;
    public $yearsList   =  null;

    public $filters_list = null;
    public $filters_text = null;

    public $miles_min;
    public $miles_max;
    public $miles_step;
}
