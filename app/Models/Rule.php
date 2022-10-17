<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    use HasFactory;
    protected $table = 'rules';
    public $timestamps = false;
    protected $fillable =  [
        'english',
        'spanish',
    ];

    /*+-----------------+
      | Relaciones      |
      +-----------------+
     */



    /*+-----------------+
      | Funciones Apoyo |
      +-----------------+
     */

    public function can_be_delete(){
        return true;
    }

    /*+-------------------+
      | Búsquedas         |
      +-------------------+
    */

    public function scopeName($query,$valor)
    {
        if ( trim($valor) != "") {
            $query->where('spanish','LIKE',"%$valor%")
                  ->orwhere('english','LIKE',"%$valor%");
         }
    }

}
