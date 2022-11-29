<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fuel extends Model
{
    use HasFactory;
    protected $table = 'fuels';
    public $timestamps = false;
    protected $fillable = [
        'name',
    ];

    /**+-----------------------------+
     * | Relaciones entre tablas     |
	 * +-----------------------------+
     */

    // Vehículos
    public function vehicles() {
		return $this->hasMany(Vehicle::class);
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
}
