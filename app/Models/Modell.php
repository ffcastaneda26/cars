<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modell extends Model
{
    use HasFactory;
    protected $table = 'models';
    public $timestamps = false;
    protected $fillable = [
        'make_id',
        'name'
    ];

    /**+-----------------------------+
     * | Relaciones entre tablas     |
	 * +-----------------------------+
     */

    // Vehículos
    public function vehicles() {
		return $this->hasMany(Vehicle::class);
	}

    // Marca
    public function make() {
        return $this->belongsTo(Make::class,'make_id','id');
      }


    /** Funciones de Apoyo */

    public function can_be_delete(){
        return true;
    }

    /**+----------------------------------------+
     * | Búsquedas x diferentes criterios       |
     * +----------------------------------------+
    */

    public function scopeName($query, $valor) {
        if (trim($valor) != "") {
            $query->where('name', 'LIKE', "%$valor%");
        }
    }


    public function scopeMakeId($query, $make_id) {
        if (trim($make_id) != "") {
            $query->where('make_id', '=', "%$valor%");
        }
    }


}
