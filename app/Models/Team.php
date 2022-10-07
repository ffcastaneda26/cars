<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $table = 'teams';
    public $timestamps = false;
    protected $fillable =  [
        'name',
        'alias',
        'short',
        'logotipo',
        'active',
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

    public function isActive(){
        return $this->active;
    }


    /*+-------------------+
      | Búsquedas         |
      +-------------------+
    */

    public function scopeTeam($query,$valor)
    {
        if ( trim($valor) != "") {
            $query->where('name','LIKE',"%$valor%")
                  ->orwhere('alias','LIKE',"%$valor%")
                  ->orwhere('short','LIKE',"%$valor%");
         }
    }


}
