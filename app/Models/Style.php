<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    use HasFactory;
    protected $table = 'styles';
    public $timestamps = false;
    protected $fillable =  [
        'name'
    ];


    /*+-----------------+
      | Relaciones      |
      +-----------------+
     */
    // Vehículos
    public function vehicles() {
		return $this->hasMany(Vehicle::class);
	}



    /*+-----------------+
      | Funciones Apoyo |
      +-----------------+
     */

    public function can_be_delete(){
        if($this->vehicles()->count()){ return false;}

        return true;
    }



    /*+-------------------+
      | Búsquedas         |
      +-------------------+
    */

    public function scopeName($query,$valor)
    {

        if ( trim($valor) != "") {
            $query->where('name','LIKE',"%$valor%");
         }
    }



}
